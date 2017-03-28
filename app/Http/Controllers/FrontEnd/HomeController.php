<?php

namespace App\Http\Controllers\FrontEnd;

use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PublishRepository;
use App\Repositories\TypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /** @var  BookRepository */
    private $bookRepository;
    private $typeRepository;
    private $categoryRepository;
    private $publishRepository;
    private $authorRepository;

    public function __construct(
        BookRepository $bookRepo,
        TypeRepository $typeRepo,
        CategoryRepository $categoryRepo,
        PublishRepository $publishRepo,
        AuthorRepository $authorRepo)
    {
        $this->bookRepository = $bookRepo;
        $this->categoryRepository = $categoryRepo;
        $this->typeRepository = $typeRepo;
        $this->publishRepository = $publishRepo;
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
        if ($request->has('name') || $request->has('department_id')) {
            $name = $request->input('name');
            $department_id = intval($request->input('department_id'));
            if($department_id > 0){
                $employees = Employees::where('name', 'like', '%'.$name.'%' )
                    ->where('department_id', $department_id)
                    ->get();
            }
            else{
                $employees = Employees::where('name', 'like', '%'.$name.'%' )->get();
            }

            $formsearch = compact('name', 'department_id');
            return view("pages.employees.index")->with([
                "formsearch" => $formsearch,
                "employees" => $employees,
                "departments" => $departments
            ]);
        } else {
            $employees = Employees::all();
            return view("pages.employees.index")->with([
                "employees" => $employees,
                "departments" => $departments
            ]);
        }
        $books = $this->bookRepository->paginate(8);
        //dd($books);
        return view('home.books')
            ->with('books', $books);
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
