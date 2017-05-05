<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Issuer;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\Type;
use App\Repositories\BookRepository;
use App\Repositories\IssuerRepository;
use App\Repositories\TypeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PublisherRepository;
use App\Repositories\AuthorRepository;
use App\Repositories\LanguageRepository;
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
    private $languageRepository;

    public function __construct(
        BookRepository $bookRepo,
        TypeRepository $typeRepo,
        CategoryRepository $categoryRepo,
        PublisherRepository $publisherRepo,
        AuthorRepository $authorRepo,
        IssuerRepository $issuerRepo,
        LanguageRepository $languageRepo
    ){
        $this->bookRepository = $bookRepo;
        $this->categoryRepository = $categoryRepo;
        $this->typeRepository = $typeRepo;
        $this->publisherRepository = $publisherRepo;
        $this->authorRepository = $authorRepo;
        $this->issuerRepository = $issuerRepo;
        $this->languageRepository = $languageRepo;
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
        $languages = $this->languageRepository->all()->pluck('name','id');
        return view('books.create')
            ->with(compact('types', 'authors', 'publishes', 'categories', 'issuers', 'languages' ));
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
        $languages = $this->languageRepository->all()->pluck('name','id');

        if (empty($book)) {
            Flash::error(__('notification.not_found', ['attribute' => __('entities.book')]));

            return redirect(route('books.index'));
        }

        return view('books.edit')->with(compact('book', 'types', 'authors', 'publishes', 'categories', 'issuers', 'languages' ));
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
        //dd($request);
        $book = $this->bookRepository->findWithoutFail($id);
        $input = $request->all();
        if (empty($book)) {
            Flash::error(__('notification.not_found', ['attribute' => __('entities.book')]));

            return redirect(route('books.index'));
        }

        if(empty($input['sale'])) $input['sale'] = 0;
        
        $except = [];
        if ($request->hasFile('front_cover')) {
            $input['front_cover'] = time().'front.'.$request->front_cover->getClientOriginalExtension();
            $request->front_cover->move(public_path('images/books '), $input['front_cover']);
        }
        else
        {
            $except[] = 'front_cover';
        }

        if ($request->hasFile('back_cover')) {
            $input['back_cover'] = time().'back.'.$request->back_cover->getClientOriginalExtension();
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
            ->leftjoin('languages','languages.id', '=', 'books.language_id')
            ->leftjoin('types','types.id', '=', 'books.type_id')
            ->select('books.name AS name', 'authors.name AS author', 'publishers.name AS publisher',
                'issuers.name AS issuer', 'size', 'page', 'weight', 'sale', 'price', 'front_cover', 'back_cover', 'publishing_year', 'languages.name AS language',
                'categories.name AS category', 'types.name AS type', 'description')
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
            try {
                $path = $request->file('import_file')->getRealPath();

                $data = Excel::load($path, function ($reader) {
                })->get();

                if (!empty($data) && $data->count()) {
                    $date = \Carbon\Carbon::today()->format('Y-m-d');
                    foreach ($data->toArray() as $key => $value) {
                        if (!empty($value)) {
                            //Get author
                            if (trim($value['name']) == '' || trim($value['name']) == null) continue;
                            $value['author'] = trim($value['author']);
                            $author = Author::where('name', $value['author'])->first();
                            if ($author == null) $author = Author::create(['name' => $value['author']]);

                            //Get publisher
                            $value['publisher'] = trim($value['publisher']);
                            $publisher = Publisher::where('name', $value['publisher'])->first();
                            if ($publisher == null) $publisher = Publisher::create(['name' => $value['publisher']]);

                            //Get issuer
                            $value['issuer'] = trim($value['issuer']);
                            $issuer = Issuer::where('name', $value['issuer'])->first();
                            if ($issuer == null) $issuer = Issuer::create(['name' => $value['issuer']]);

                            //Get language
                            $value['language'] = trim($value['language']);
                            $language = Language::where('name', $value['language'])->first();
                            if ($language == null) $language = Language::create(['name' => $value['language']]);

                            //Get category
                            $value['category'] = trim($value['category']);
                            $category = Category::where('name', $value['category'])->first();
                            if ($category == null) $category = Category::create(['name' => $value['category']]);

                            //Get type
                            $value['type'] = trim($value['type']);
                            $type = Type::where('name', $value['type'])->first();
                            if ($type == null) $type = Type::create(['name' => $value['type']]);

                            $insert[] = ['name' => trim($value['name']), 'author_id' => $author->id, 'publisher_id' => $publisher->id,
                                'issuer_id' => $issuer->id, 'description' => trim($value['description']), 'size' => $value['size'],
                                'front_cover' => $value['front_cover'], 'back_cover' => $value['back_cover'], 'price' => floatval($value['price']),
                                'publishing_year' => intval($value['publishing_year']), 'page' => intval($value['page']), 'sale' => intval($value['sale']),
                                'weight' => intval($value['weight']), 'language_id' => $language->id, 'category_id' => $category->id,
                                'type_id' => $type->id,];
                        }
                    }

                    if (!empty($insert)) {
                        foreach ($insert as $input) {
                            $this->bookRepository->create($input);
                        }
                        return back()->with('success', 'Inserted ' . count($insert) . ' records successfully.');
                    }

                }
            }catch(\Exception $e){
                return back()->with('error','Please Check your file, Something is wrong there.');
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
