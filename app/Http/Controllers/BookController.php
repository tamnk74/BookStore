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
use App\Models\Store;
use App\Repositories\BookRepository;
use App\Repositories\IssuerRepository;
use App\Repositories\TypeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PublisherRepository;
use App\Repositories\AuthorRepository;
use App\Repositories\LanguageRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;

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
        //DB::enableQueryLog();
        $categories = [null => 'Tất cả'];
        $key = '';
        $category_id = null;
        foreach($this->categoryRepository->all()->pluck('name','id') as $id => $name) {
            $categories[$id] = $name;
        }
        //Search form
        $books = Book::leftjoin('authors', 'authors.id', 'author_id');
        $category_id = $request->input('category_id');
        $key = $request->input('key');
        $books = $books->where(function($query) use ($key, $category_id){
                            $query->where('books.name','like', '%'.$key.'%');
                            if($category_id != null) $query->where('category_id', $category_id);
                        })
                        ->orWhere(function($query) use ($key, $category_id){
                            $query->where('authors.name','like', '%'.$key.'%');
                            if($category_id != null) $query->where('category_id', $category_id);
                        })
                        ->select('books.*')->paginate(10);
        //dd(DB::getQueryLog());
        return view('books.index', compact('books', 'key', 'categories', 'category_id'));
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

    public function updateSale(Request $request)
    {
        if($request->has('id') && $request->has('sale')){
            $id = intval($request->input('id'));
            $sale = intval($request->input('sale'));
            $book = $this->bookRepository->find($id);
            if($book == null) return $this->sendError(false);
            if($sale < 0 || $sale > 100) return $this->sendError('Dữ liệu không hợp lệ!');
            $book->update(['sale' => $sale]);
            return $this->sendResponse($book, 'Updated book successfully');
        }
        else return $this->sendError('Dữ liệu không hợp lệ!');
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
            ->select('books.name AS Tên sách', 'authors.name AS Tác giả', 'publishers.name AS Nhà xuất bản',
                'issuers.name AS Nhà phát hành', 'size as Kích thước(cm)', 'page as Số trang', 'weight as Khối lượng(gram)',
                'sale as Giảm giá(%)', 'price as Giá bìa(VND)', 'front_cover as Bìa trước', 'back_cover as Bìa sau', 'publishing_year as Năm xuất bản', 'languages.name AS Ngôn ngữ',
                'categories.name AS Chủ đề', 'types.name AS Thể loại', 'description AS Mô tả')
            ->get()->toArray();
        //$data = $this->bookRepository->all()->toArray();
//        /*for($i=0; $i < count($data); $i++){
//            $data[$i] = array_except($data[$i], ['created_at', 'updated_at', 'deleted_at']);
//        }*/
        return Excel::create('danh_sach_sach'.Carbon::now()->format('dmY'), function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data, null, 'A1', true);
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
                //dd($data);
                if (!empty($data) && $data->count()) {
                    $date = \Carbon\Carbon::today()->format('Y-m-d');
                    foreach ($data->toArray() as $key => $value) {
                        if (!empty($value)) {
                            //Check book name
                            $status = true;
                            if(!isset($value['ten_sach'])) continue;
                            $bookName = trim($value['ten_sach']);
                            $book = $this->bookRepository->findByField('name', $bookName)->first();
                            if( $book != null) continue;

                            //Get author
                            if (!isset($value['tac_gia']) || empty(trim($value['tac_gia']))) continue;
                            $value['tac_gia'] = trim($value['tac_gia']);
                            $author = Author::where('name', $value['tac_gia'])->first();
                            if ($author == null) $author = Author::create(['name' => $value['tac_gia']]);

                            //Get publisher
                            if (!isset($value['nha_xuat_ban']) || empty(trim($value['nha_xuat_ban']))) continue;
                            $value['nha_xuat_ban'] = trim($value['nha_xuat_ban']);
                            $publisher = Publisher::where('name', $value['nha_xuat_ban'])->first();
                            if ($publisher == null) $publisher = Publisher::create(['name' => $value['nha_xuat_ban']]);

                            //Get issuer
                            if (!isset($value['nha_phat_hanh']) || empty(trim($value['nha_phat_hanh']))) continue;
                            $value['nha_phat_hanh'] = trim($value['nha_phat_hanh']);
                            $issuer = Issuer::where('name', $value['nha_phat_hanh'])->first();
                            if ($issuer == null) $issuer = Issuer::create(['name' => $value['nha_phat_hanh']]);

                            //Get language
                            if (!isset($value['ngon_ngu']) || empty(trim($value['ngon_ngu']))) continue;
                            $value['ngon_ngu'] = trim($value['ngon_ngu']);
                            $language = Language::where('name', $value['ngon_ngu'])->first();
                            if ($language == null) $language = Language::create(['name' => $value['ngon_ngu']]);

                            //Get category
                            if (!isset($value['chu_de']) || empty(trim($value['chu_de']))) continue;
                            $value['chu_de'] = trim($value['chu_de']);
                            $category = Category::where('name', $value['chu_de'])->first();
                            if ($category == null) $category = Category::create(['name' => $value['chu_de']]);

                            //Get type
                            if (!isset($value['the_loai']) || empty(trim($value['the_loai']))) continue;
                            $value['the_loai'] = trim($value['the_loai']);
                            $type = Type::where('name', $value['the_loai'])->first();
                            if ($type == null) $type = Type::create(['name' => $value['the_loai']]);

                            $description = isset($value['mo_ta']) ? trim($value['mo_ta']): '';
                            $size = isset($value['kich_thuoccm']) ? trim($value['kich_thuoccm']): '';
                            $front_cover = isset($value['bia_truoc']) ? trim($value['bia_truoc']): '';
                            $back_cover = isset($value['bia_sau']) ? trim($value['bia_sau']): '';
                            $price = isset($value['gia_biavnd']) ? floatval($value['gia_biavnd']): 0;
                            $publishing_year = isset($value['nam_xuat_ban']) ? intval($value['nam_xuat_ban']): 0;
                            $page = isset($value['so_trang']) ? intval($value['so_trang']): 0;
                            $sale = isset($value['giam_gia']) ? intval($value['giam_gia']): 0;
                            $weight = isset($value['khoi_luonggram']) ? intval($value['khoi_luonggram']): 0;

                            $insert[] = ['name' => $bookName, 'author_id' => $author->id, 'publisher_id' => $publisher->id,
                                'issuer_id' => $issuer->id, 'description' => $description, 'size' => $size,
                                'front_cover' => $front_cover, 'back_cover' => $back_cover, 'price' => $price,
                                'publishing_year' => $publishing_year, 'page' => $page, 'sale' => $sale,
                                'weight' => $weight, 'language_id' => $language->id, 'category_id' => $category->id,
                                'type_id' => $type->id];

                        }
                    }

                    if (!empty($insert)) {
                        $books = array();
                        foreach ($insert as $input) {
                            $book = $this->bookRepository->create($input);
                            if($book != null) {
                                $books[] = $book;
                                Store::create(['book_id' => $book->id, 'amount' => 0, 'total_amount' => 0]);
                            }
                        }
                        return back()->with('books', $books)->with('success', 'Thêm thành công ' . count($insert) . ' cuốn sách.');
                    }else{
                        return back()->with('error','Dữ liệu không đúng!.');
                    }

                }
            }catch(\Exception $e){
                return back()->with('error','File sai định dạng.');
            }
        }
        return back()->with('error','Không tìm thấy file');
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
