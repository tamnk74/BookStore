<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Repositories\BookRepository;
use App\Repositories\TypeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PublishRepository;
use App\Repositories\AuthorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BookController extends AppBaseController
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
        $this->bookRepository->pushCriteria(new RequestCriteria($request));
        $books = $this->bookRepository->paginate(10);
        //dd($books);
        return view('books.index')
            ->with('books', $books);
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
        $publishes = $this->publishRepository->all()->pluck('name','id');
        $categories = $this->categoryRepository->all()->pluck('name','id');
        return view('books.create')
            ->with(compact('types', 'authors', 'publishes', 'categories' ));
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

        Flash::success('Book saved successfully.');

        return redirect(route('books.index'));
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
        $publishes = $this->publishRepository->all()->pluck('name','id');
        $categories = $this->categoryRepository->all()->pluck('name','id');

        if (empty($book)) {
            Flash::error('Book not found');

            return redirect(route('books.index'));
        }

        return view('books.edit')->with(compact('book', 'types', 'authors', 'publishes', 'categories' ));
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
            Flash::error('Book not found');

            return redirect(route('books.index'));
        }
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

        Flash::success('Book updated successfully.');

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
            Flash::error('Book not found');

            return redirect(route('books.index'));
        }

        $this->bookRepository->delete($id);

        Flash::success('Book deleted successfully.');

        return redirect(route('books.index'));
    }
}
