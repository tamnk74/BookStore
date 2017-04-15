<?php

namespace App\Http\Controllers\FrontEnd;

use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PublisherRepository;
use App\Repositories\TypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        if (empty($book)) {
            Flash::error('Book not found');

            return redirect(route('books.show_book'));
        }

        return view('home.show_book')->with('book', $book);
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
        //Search form
        if ($request->has('search')) {
            $search = $request->input('search');
            $books = $this->bookRepository->findWhere([
                ['name','like','%'.$search.'%']
            ]);
            return view('home.books')
                ->with('books', $books);
        } else {
            $books = $this->bookRepository->paginate(8);
            //dd($books);
            return view('home.books')
                ->with('books', $books);
        }

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
}
