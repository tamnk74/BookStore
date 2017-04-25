<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Repositories\BookRepository;
use App\Repositories\IssuerRepository;
use App\Repositories\TypeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PublisherRepository;
use App\Repositories\AuthorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Excel;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BookController extends AppBaseController
{
    /** @var  BookRepository */
    private $bookRepository;
    private $typeRepository;
    private $categoryRepository;
    private $publisherRepository;
    private $authorRepository;
    private $issuerRepository;

    public function __construct(
        BookRepository $bookRepo,
        TypeRepository $typeRepo,
        CategoryRepository $categoryRepo,
        PublisherRepository $publisherRepo,
        AuthorRepository $authorRepo,
        IssuerRepository $issuerRepo
    ){
        $this->bookRepository = $bookRepo;
        $this->categoryRepository = $categoryRepo;
        $this->typeRepository = $typeRepo;
        $this->publisherRepository = $publisherRepo;
        $this->authorRepository = $authorRepo;
        $this->issuerRepository = $issuerRepo;
    }

    /**
     * Display a listing of the Book.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bookRepository->pushCriteria(new RequestCriteria($request));
        //Search form
        if ($request->has('key')) {
            $key = $request->input('key');
            $books = Book::where('name','like', '%'.$key.'%')->paginate(10);
            return view('books.index')
                ->with('books', $books)->with('key',$key);
        } else {
            $books = $this->bookRepository->paginate(10);
            return view('books.index')
                ->with('books', $books);
        }
    }

    /**
     * Show the form for creating a new Book.
     *
     * @return Response
     */
    public function create()
    {
        $types = $this->typeRepository->all()->pluck('name','id');
        $authors = $this->authorRepository->all()->pluck('name','id');
        $publishes = $this->publisherRepository->all()->pluck('name','id');
        $categories = $this->categoryRepository->all()->pluck('name','id');
        $issuers = $this->issuerRepository->all()->pluck('name','id');
        return view('books.create')
            ->with(compact('types', 'authors', 'publishes', 'categories', 'issuers' ));
    }
    /**
     * show the form to import books from excel file
     *
     * @return Response
     */
    public function create_file()
    {
        return view('books.create_file');
    }

    /**
     * Store a newly created Book in storage.
     *
     * @param CreateBookRequest $request
     *
     * @return Response
     */
    public function store(CreateBookRequest $request)
    {
        $input = $request->all();

        if(empty($input['sale'])) $input['sale'] = 0;
        if ($request->hasFile('front_cover')) {
            $input['front_cover'] = time().'.'.$request->front_cover->getClientOriginalExtension();
            $request->front_cover->move(public_path('images/books '), $input['front_cover']);
        } 
        else {
            $input['front_cover'] = 'front_cover.png';
        }

        if ($request->hasFile('back_cover')) {
            $input['back_cover'] = time().'.'.$request->back_cover->getClientOriginalExtension();
            $request->back_cover->move(public_path('images/books '), $input['back_cover']);
        }
        else {
            $input['back_cover'] = 'back_cover.png';
        }

        $book = $this->bookRepository->create($input);

        Flash::success(__('notification.not_found', ['attribute' => __('entities.book')]));

        return redirect(route('books.index'));
    }

    /**
     * Display the specified Book.
     *publisherRepo
     * @param  int $id
     *
     * @return Response
     */

    public function show($id)
    {
        dd('abf');
        $book = $this->bookRepository->findWithoutFail($id);

        if (empty($book)) {
            Flash::error(__('notification.not_found', ['attribute' => __('entities.book')]));

            return redirect(route('books.index'));
        }

        return view('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified Book.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $book = $this->bookRepository->findWithoutFail($id);
        $types = $this->typeRepository->all()->pluck('name','id');
        $authors = $this->authorRepository->all()->pluck('name','id');
        $publishes = $this->publisherRepository->all()->pluck('name','id');
        $categories = $this->categoryRepository->all()->pluck('name','id');
        $issuers = $this->issuerRepository->all()->pluck('name','id');

        if (empty($book)) {
            Flash::error(__('notification.not_found', ['attribute' => __('entities.book')]));

            return redirect(route('books.index'));
        }

        return view('books.edit')->with(compact('book', 'types', 'authors', 'publishes', 'categories', 'issuers' ));
    }

    /**
     * Update the specified Book in storage.
     *
     * @param  int              $id
     * @param UpdateBookRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookRequest $request)
    {
        $book = $this->bookRepository->findWithoutFail($id);
        $input = $request->all();
        if (empty($book)) {
            Flash::error(__('notification.not_found', ['attribute' => __('entities.book')]));

            return redirect(route('books.index'));
        }

        if(empty($input['sale'])) $input['sale'] = 0;
        
        $except = [];
        if ($request->hasFile('front_cover')) {
            $input['front_cover'] = time().'.'.$request->front_cover->getClientOriginalExtension();
            $request->front_cover->move(public_path('images/books '), $input['front_cover']);
        }
        else
        {
            $except[] = 'front_cover';
        }

        if ($request->hasFile('back_cover')) {
            $input['back_cover'] = time().'.'.$request->back_cover->getClientOriginalExtension();
            $request->back_cover->move(public_path('images/books '), $input['back_cover']);
        }
        else
        {
            $except[] = 'back_cover';
        }

        $book = $this->bookRepository->update(array_except($input, $except), $id);

        Flash::success(__('notification.updated_success', ['attribute' => __('entities.book')]));

        return redirect(route('books.index'));
    }

    /**
     * Remove the specified Book from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $book = $this->bookRepository->findWithoutFail($id);

        if (empty($book)) {
            Flash::error(__('notification.not_found', ['attribute' => __('entities.book')]));

            return redirect(route('books.index'));
        }

        $this->bookRepository->delete($id);

        Flash::success(__('notification.deleted_success', ['attribute' => __('entities.book')]));

        return redirect(route('books.index'));
    }

    /**
     * File Export Code
     *
     * @var array
     */
    public function downloadExcel(Request $request)
    {
        $data = Book::leftjoin('authors','authors.id', '=', 'books.author_id')
            ->leftjoin('publishers','publishers.id', '=', 'books.publisher_id')
            ->leftjoin('issuers','issuers.id', '=', 'books.issuer_id')
            ->leftjoin('categories','categories.id', '=', 'books.category_id')
            ->leftjoin('types','types.id', '=', 'books.type_id')
            ->select('books.name AS name', 'authors.name AS author', 'publishers.name AS publisher',
                'issuers.name AS issuer', 'size', 'page', 'weight', 'categories.name AS categoriy', 'types.name AS types', 'description')
            ->get()->toArray();
        //$data = $this->bookRepository->all()->toArray();
//        /*for($i=0; $i < count($data); $i++){
//            $data[$i] = array_except($data[$i], ['created_at', 'updated_at', 'deleted_at']);
//        }*/
        return Excel::create('danh_sach_sach', function($excel) use ($data) {
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

            $path = $request->file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){
                $date = \Carbon\Carbon::today()->format('Y-m-d');
                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        $insert[] = ['book_id' => $value['ma_sach'], 'amount' => $value['so_luong'], 'price' => $value['gia_mua'], 'date' => $date];
                    }
                }

                if(!empty($insert)){
                    foreach($insert as $input){
                        $this->importBookRepository->create($input);
                    }
                    return back()->with('success','Insert Record successfully.');
                }

            }
        }
        return back()->with('error','Please Check your file, Something is wrong there.');
    }

    public function searchBook(Request $request){
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = Book::leftjoin('authors', 'authors.id', '=', 'books.author_id')
                ->select("books.id",  "books.name", "authors.name AS author", "books.front_cover")
                ->where('books.name','LIKE',"%$search%")
                ->get();
        }
        return response()->json(["items"=>$data]);
    }

    public function getBook(Request $request){
        if($request->has('id')){
            $id = $request->id;
            $book = $this->bookRepository->find($id);
        }
        else{
            return response()->json(["error" => "Could find id"]);
        }
        if($book == null) return response()->json(["error" => "Could find that book"]);

        return response()->json(["subtotal"=>$book->price*(100-$book->sale)/100]);
    }
}
