<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Category;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PublisherRepository;
use App\Repositories\TypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Laracasts\Flash\Flash;

class HomeController extends Controller
{
    /** @var  BookRepository */
    private $bookRepository;
    private $typeRepository;
    private $categoryRepository;
    private $publisherRepository;
    private $authorRepository;

    public function __construct(
        BookRepository $bookRepo,
        TypeRepository $typeRepo,
        CategoryRepository $categoryRepo,
        PublisherRepository $publisherRepo,
        AuthorRepository $authorRepo)
    {
        $this->bookRepository = $bookRepo;
        $this->categoryRepository = $categoryRepo;
        $this->typeRepository = $typeRepo;
        $this->publisherRepository = $publisherRepo;
        $this->authorRepository = $authorRepo;
    }

    /**
 * Display a listing of the Book.
 *
 * @param Request $request
 * @return Response
 */
    public function index(Request $request)
    {
        $books = $this->bookRepository->paginate(8);
        //dd($books);
        return view('home.index')
            ->with('books', $books);
    }

    /**
     * Display the specified Book.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $book = $this->bookRepository->findWithoutFail($id);
        $relatedBooks = Book::where('category_id', $book->category_id)
                        ->where('id', '<>', $book->id)->paginate(6);
        $authoredBooks = Book::where('author_id', $book->author_id)->where('id', '<>', $book->id)->paginate(6);
        if (empty($book)) {
            Flash::error('Book not found');
            return redirect(route('book'));
        }

        return view('home.show_book', compact('book', 'relatedBooks', 'authoredBooks'));
    }

    /**
     * Display the specified Book.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function listBook(Request $request)
    {
        $categories = Category::take(20)->get();
        $total = Book::count();
        //Search form
        if ($request->has('search')) {
            $search = $request->input('search');
            $books = Book::where('name','like','%'.$search.'%')->paginate(12);
            return view('home.books', compact('books', 'categories'));
        } else {
            $books = $this->bookRepository->paginate(12);
            return view('home.books', compact('books', 'categories', 'total'));
            //return view('home.books')->with('books', $books)->with('categories', $categories)->
        }

    }

    /**
     * Display the specified Book.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function getBookByCategory($id, Request $request)
    {
        $categories = Category::take(20)->get();
        //Search form
        $total = Book::where('category_id', $id)->count();
        $books = Book::where('category_id', $id)->paginate(1);
        return view('home.books', compact('books', 'categories', 'total'));
    }

    /**
     * Display the specified Book.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function contact()
    {
        return view('home.contact');
    }

    public function searchBook(Request $request){
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = Book::leftjoin('authors', 'authors.id', '=', 'books.author_id')
                ->select("books.id",  "books.name", "authors.name AS author", "books.front_cover")
                ->where('books.name','LIKE',"%$search%")
                ->take(20)
                ->get();
            foreach ($data as $item){
                $item->url = route('show', ['id'=> $item->id]);
                $item->icon = asset('images/books/'.$item->front_cover);
                $item->class = 'book';
            }
        }
        return response()->json(["data"=>$data]);
    }
}
