<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateImportBookRequest;
use App\Http\Requests\UpdateImportBookRequest;
use App\Repositories\ImportBookRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ImportBookController extends AppBaseController
{
    /** @var  ImportBookRepository */
    private $importBookRepository;

    public function __construct(ImportBookRepository $importBookRepo)
    {
        $this->importBookRepository = $importBookRepo;
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
        $importBooks = $this->importBookRepository->all();

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
        return view('import_books.create');
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

        return view('import_books.edit')->with('importBook', $importBook);
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
