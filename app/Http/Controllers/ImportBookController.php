<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateImportBookRequest;
use App\Http\Requests\UpdateImportBookRequest;
use App\Models\Store;
use App\Models\Supplier;
use App\Repositories\ImportBookRepository;
use App\Repositories\BookRepository;
use App\Repositories\StoreRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SupplierRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Excel;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\ImportBook;
use Illuminate\Support\Facades\Auth;

class ImportBookController extends AppBaseController
{
    /** @var  ImportBookRepository */
    private $importBookRepository;
    private $bookRepository;
    private $storeRepository;
    private $supplierRepository;

    public function __construct(
        ImportBookRepository $importBookRepo, 
        BookRepository $bookRepo,
        StoreRepository $storeRepo,
        SupplierRepository $supplierRepo)
    {
        $this->importBookRepository = $importBookRepo;
        $this->bookRepository = $bookRepo;
        $this->storeRepository = $storeRepo;
        $this->supplierRepository = $supplierRepo;
    }

    /**
     * Display a listing of the ImportBook.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->importBookRepository->pushCriteria(new RequestCriteria($request));
        $importBooks = $this->importBookRepository->paginate(10);

        return view('import_books.index')
            ->with('importBooks', $importBooks);
    }

    /**
     * Show the form for creating a new ImportBook.
     *
     * @return Response
     */
    public function create()
    {
        $books = $this->bookRepository->all()->pluck('name', 'id');
        $supplier = $this->supplierRepository->all()->pluck('name', 'id');

        return view('import_books.create', compact('books', 'supplier'));
    }

    public function create_file()
    {
        return view('import_books.create_file');
    }

    /**
     * File Export Code
     *
     * @var array
     */
	public function downloadExcel(Request $request)
	{
        $data = ImportBook::leftjoin('suppliers','suppliers.id', '=', 'import_books.supplier_id')
                    ->leftjoin('books','books.id', '=', 'import_books.book_id')
                    ->select('books.name AS book_name', 'suppliers.name AS supplier', 'amount',
                        'import_books.price AS price', 'import_books.created_at AS date')
                    ->get()->toArray();
        /*for($i=0; $i < count($data); $i++){
            $data[$i] = array_except($data[$i], ['user_id', 'created_at', 'updated_at', 'deleted_at']);
        }*/
		return Excel::create('danh_sach_nhap_sach', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download('xlsx');
	}

	/**
     * Import file into database Code
     *
     * @var array
     */
	public function importExcel(Request $request)
	{
        //dd($request);
		if($request->hasFile('import_file')){
            try {
                $path = $request->file('import_file')->getRealPath();

                $data = Excel::load($path, function ($reader) {
                })->get();

                if (!empty($data) && $data->count()) {
                    $date = \Carbon\Carbon::today()->format('Y-m-d');
                    foreach ($data->toArray() as $key => $value) {
                        if (!empty($value)) {
                            //Get supplier
                            $value['supplier'] = trim($value['supplier']);
                            $supplier = Supplier::where('name', $value['supplier'])->first();
                            if ($supplier == null) $supplier = Supplier::create(['name' => $value['supplier']]);

                            //Get supplier
                            $value['book_name'] = trim($value['book_name']);
                            $book = Book::where('name', $value['book_name'])->first();
                            if ($book == null) $book = Book::create(['name' => $value['book_name']]);

                            $insert[] = ['user_id' => Auth::user()->id, 'book_id' => $book->id, 'supplier_id' => $supplier->id,
                                'amount' => $value['amount'], 'price' => $value['price'], 'date' => $date];

                        }
                    }

                    if (!empty($insert)) {
                        foreach ($insert as $input) {
                            $this->importBookRepository->create($input);
                        }
                        return back()->with('success', 'Insert Record successfully.');
                    }

                }
            }catch(\Exception $e){
                return back()->with('error','Please Check your file, Something is wrong there.');
            }
		}
		return back()->with('error','Please Check your file, Something is wrong there.');
	}


    /**
     * Store a newly created ImportBook in storage.
     *
     * @param CreateImportBookRequest $request
     *
     * @return Response
     */
    public function store(CreateImportBookRequest $request)
    {
        $input = $request->all();

        $book = $this->bookRepository->findWithoutFail($input['book_id']);
        if (empty($book)) {
            Flash::error('Book not found');
            return redirect(route('importBooks.index'));
        }

        $supplier = $this->supplierRepository->findWithoutFail($input['supplier_id']);
        if (empty($supplier)) {
            Flash::error('Supplier not found');
            return redirect(route('importBooks.index'));
        }

        $store = $this->storeRepository->findWithoutFail($input['book_id']);
        if(empty($store)){
            Store::create([
                'book_id' => $input['book_id'],
                'amount' => 0,
                'total_amount' => 0
                ]);
        }
        $input['user_id'] = Auth::user()->id;

        $importBook = $this->importBookRepository->create($input);

        Flash::success('Import Book saved successfully.');

        return redirect(route('importBooks.index'));
    }

    /**
     * Display the specified ImportBook.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $importBook = $this->importBookRepository->findWithoutFail($id);

        if (empty($importBook)) {
            Flash::error('Import Book not found');

            return redirect(route('importBooks.index'));
        }

        return view('import_books.show')->with('importBook', $importBook);
    }

    /**
     * Show the form for editing the specified ImportBook.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $importBook = $this->importBookRepository->findWithoutFail($id);
        if (empty($importBook)) {
            Flash::error('Import Book not found');

            return redirect(route('importBooks.index'));
        }
        $books = $this->bookRepository->all()->pluck('name', 'id');
        $supplier = $this->supplierRepository->all()->pluck('name', 'id');

        return view('import_books.edit', compact('importBook','books', 'supplier'));
    }

    /**
     * Update the specified ImportBook in storage.
     *
     * @param  int              $id
     * @param UpdateImportBookRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImportBookRequest $request)
    {
        $importBook = $this->importBookRepository->findWithoutFail($id);

        if (empty($importBook)) {
            Flash::error('Import Book not found');

            return redirect(route('importBooks.index'));
        }

        $importBook = $this->importBookRepository->update($request->all(), $id);

        Flash::success('Import Book updated successfully.');

        return redirect(route('importBooks.index'));
    }

    /**
     * Remove the specified ImportBook from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $importBook = $this->importBookRepository->findWithoutFail($id);

        if (empty($importBook)) {
            Flash::error('Import Book not found');

            return redirect(route('importBooks.index'));
        }

        $this->importBookRepository->delete($id);

        Flash::success('Import Book deleted successfully.');

        return redirect(route('importBooks.index'));
    }
}
