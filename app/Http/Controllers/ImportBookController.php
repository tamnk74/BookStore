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
use Carbon\Carbon;

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
        $importBooks = ImportBook::orderBy('created_at', 'desc')->paginate(10);

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

    public function createFile()
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
	    $date = Carbon::now();
	    if($request->has('date')) {
	        $date = Carbon::createFromFormat('Y-m-d', $request->input('date'));
        }
        $import = ImportBook::leftjoin('suppliers','suppliers.id', '=', 'import_books.supplier_id')
                    ->leftjoin('books','books.id', '=', 'import_books.book_id')
                    ->whereDate('import_books.created_at', $date->toDateString())
                    ->select('books.name AS Tên sách', 'suppliers.name AS Nhà cung cấp', 'amount AS Số lượng',
                        'import_books.price AS Giá cả(VND)', 'import_books.created_at AS Ngày nhập')
                    ->get();
        $data= $import->toArray();
        for($i =0; $i< count($data); $i++){
            $data[$i] =  ['STT' => $i+1] + $data[$i];
        }
        array_push($data, ['', 'Danh sách các đợt nhập sách ngày '.$date]);
        array_push($data, ['', 'Tổng sô sách: ', $import->sum('Số lượng').' cuốn sách']);
        array_push($data, ['', 'Tổng chi phí: ', $import->sum('Giá cả(VND)').' VND']);


        //dd($data);
        /*for($i=0; $i < count($data); $i++){
            $data[$i] = array_except($data[$i], ['user_id', 'created_at', 'updated_at', 'deleted_at']);
        }*/
		return Excel::create('danh_sach_nhap_sach'.$date, function($excel) use ($data) {

            $excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
                // Set black background
                $sheet->row(1, function($row) {
                    // call cell manipulation methods
                    $row->setBackground('#1ad1ff');
                    $row->setFontSize(16);
                    $row->setFontWeight('bold');
                });
                $sheet->row(count($data)-1, function($row) {
                    $row->setFontWeight('bold');
                });
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
		if($request->hasFile('import_file')){
            try {
                $path = $request->file('import_file')->getRealPath();

                $data = Excel::load($path, function ($reader) {
                })->get();
                //dd($data->toArray());
                if (!empty($data) && $data->count()) {
                    $date = \Carbon\Carbon::today()->format('Y-m-d');
                    foreach ($data->toArray() as $key => $value) {
                        if (!empty($value)) {
                            //Get supplier
                            $supplierName = trim($value['nha_cung_cap']);
                            if(empty($supplierName)) continue;
                            $supplier = Supplier::where('name', $supplierName)->first();
                            if ($supplier == null) $supplier = Supplier::create(['name' => $supplierName]);

                            //Get book
                            $bookName = trim($value['ten_sach']);
                            if(empty($bookName)) continue;
                            $book = Book::where('name', $bookName)->first();
                            if ($book == null) continue;

                            if(!isset($value['so_luong']) || !isset($value['gia_cavnd'])) continue;

                            $insert[] = ['user_id' => Auth::user()->id, 'book_id' => $book->id, 'supplier_id' => $supplier->id,
                                'amount' => intval($value['so_luong']), 'price' => intval($value['gia_cavnd']), 'date' => $date];
                        }
                    }
                    if (!empty($insert)) {
                        $sum = 0;
                        $importBooks= [];
                        foreach ($insert as $input) {
                            $importBook = $this->importBookRepository->create($input);
                            if($importBook != null) $importBooks[] = $importBook;
                            $sum += $input['amount'];
                        }
                        return back()->with('importBooks', $importBooks)->with('success', 'Nhập thành công '.count($importBooks).' đợt sách(bao gồm '.$sum.' cuốn sách)!');
                    }

                }
            }catch(\Exception $e){
                return back()->with('error','File nhập vào không đúng định dạng');
            }
		}
		return back()->with('error','File nhập vào không đúng');
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
            Flash::error('Không tìm thấy sách!');
            return redirect(route('importBooks.index'));
        }

        $supplier = $this->supplierRepository->findWithoutFail($input['supplier_id']);
        if (empty($supplier)) {
            Flash::error('Không tìm thấy nhà cung cấp');
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
        if($importBook != null){
            $store = Store::where('book_id', $importBook->book_id)->first();
            $store->update(['amount' => $store->amount + $importBook->amount, 'total_amount' => $store->total_amount + $importBook->amount]);
        }
        Flash::success('Nhập sách thành công.');

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
            Flash::error('Không tìm thấy đợt nhập sách cần cập nhật');

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
            Flash::error('Không tìm thấy đợt nhập sách cần cập nhật');

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
            Flash::error('Không tìm thấy đợt nhập sách cần cập nhật');

            return redirect(route('importBooks.index'));
        }
        $oldNumber = $importBook->amount;
        $importBook = $this->importBookRepository->update($request->all(), $id);
        $newNumber = $importBook->amount;
        if($importBook != null){
            $store = Store::where('book_id', $importBook->book_id)->first();
            $store->update(['amount' => $store->amount + $oldNumber - $newNumber, 'total_amount' => $store->total_amount + $oldNumber - $newNumber]);
        }
        Flash::success('Cập nhật đợt nhập sách thành công.');

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
            Flash::error('Không tìm thấy đợt nhập sách cần cập nhật');

            return redirect(route('importBooks.index'));
        }
        $oldNumber = $importBook->amount;
        $status = $this->importBookRepository->delete($id);
        if($status == 1) {
            $store = Store::where('book_id', $importBook->book_id)->first();
            $store->update(['amount' => $store->amount - $oldNumber, 'total_amount' => $store->total_amount - $oldNumber]);
        }
        Flash::success('Xóa đợt nhập sách thành công.');

        return redirect(route('importBooks.index'));
    }
}
