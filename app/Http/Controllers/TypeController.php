<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Repositories\TypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TypeController extends AppBaseController
{
    /** @var  TypeRepository */
    private $typeRepository;

    public function __construct(TypeRepository $typeRepo)
    {
        $this->typeRepository = $typeRepo;
    }

    /**
     * Display a listing of the Type.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->typeRepository->pushCriteria(new RequestCriteria($request));
        $types = $this->typeRepository->all();

        return view('types.index')
            ->with('types', $types);
    }

    /**
     * Show the form for creating a new Type.
     *
     * @return Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created Type in storage.
     *
     * @param CreateTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeRequest $request)
    {
        $input = $request->all();

        $type = $this->typeRepository->create($input);

        Flash::success('Type saved successfully.');

        return redirect(route('types.index'));
    }

    /**
     * Display the specified Type.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $type = $this->typeRepository->findWithoutFail($id);

        if (empty($type)) {
            Flash::error('Type not found');

            return redirect(route('types.index'));
        }

        return view('types.show')->with('type', $type);
    }

    /**
     * Show the form for editing the specified Type.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $type = $this->typeRepository->findWithoutFail($id);

        if (empty($type)) {
            Flash::error('Type not found');

            return redirect(route('types.index'));
        }

        return view('types.edit')->with('type', $type);
    }

    /**
     * Update the specified Type in storage.
     *
     * @param  int              $id
     * @param UpdateTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeRequest $request)
    {
        $type = $this->typeRepository->findWithoutFail($id);

        if (empty($type)) {
            Flash::error('Type not found');

            return redirect(route('types.index'));
        }

        $type = $this->typeRepository->update($request->all(), $id);

        Flash::success('Type updated successfully.');

        return redirect(route('types.index'));
    }

    /**
     * Remove the specified Type from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $type = $this->typeRepository->findWithoutFail($id);

        if (empty($type)) {
            Flash::error('Type not found');

            return redirect(route('types.index'));
        }

        $this->typeRepository->delete($id);

        Flash::success('Type deleted successfully.');

        return redirect(route('types.index'));
    }
}
