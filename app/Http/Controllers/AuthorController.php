<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Repositories\AuthorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AuthorController extends AppBaseController
{
    /** @var  AuthorRepository */
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepo)
    {
        $this->authorRepository = $authorRepo;
    }

    /**
     * Display a listing of the Author.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->authorRepository->pushCriteria(new RequestCriteria($request));
        $authors = $this->authorRepository->all();

        return view('authors.index')
            ->with('authors', $authors);
    }

    /**
     * Show the form for creating a new Author.
     *
     * @return Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created Author in storage.
     *
     * @param CreateAuthorRequest $request
     *
     * @return Response
     */
    public function store(CreateAuthorRequest $request)
    {
        $input = $request->all();

        $author = $this->authorRepository->create($input);

        Flash::success('Author saved successfully.');

        return redirect(route('authors.index'));
    }

    /**
     * Display the specified Author.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $author = $this->authorRepository->findWithoutFail($id);

        if (empty($author)) {
            Flash::error('Author not found');

            return redirect(route('authors.index'));
        }

        return view('authors.show')->with('author', $author);
    }

    /**
     * Show the form for editing the specified Author.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $author = $this->authorRepository->findWithoutFail($id);

        if (empty($author)) {
            Flash::error('Author not found');

            return redirect(route('authors.index'));
        }

        return view('authors.edit')->with('author', $author);
    }

    /**
     * Update the specified Author in storage.
     *
     * @param  int              $id
     * @param UpdateAuthorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAuthorRequest $request)
    {
        $author = $this->authorRepository->findWithoutFail($id);

        if (empty($author)) {
            Flash::error('Author not found');

            return redirect(route('authors.index'));
        }

        $author = $this->authorRepository->update($request->all(), $id);

        Flash::success('Author updated successfully.');

        return redirect(route('authors.index'));
    }

    /**
     * Remove the specified Author from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $author = $this->authorRepository->findWithoutFail($id);

        if (empty($author)) {
            Flash::error('Author not found');

            return redirect(route('authors.index'));
        }

        $this->authorRepository->delete($id);

        Flash::success('Author deleted successfully.');

        return redirect(route('authors.index'));
    }
}
