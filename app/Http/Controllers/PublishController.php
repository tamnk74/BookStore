<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePublishRequest;
use App\Http\Requests\UpdatePublishRequest;
use App\Repositories\PublishRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PublishController extends AppBaseController
{
    /** @var  PublishRepository */
    private $publishRepository;

    public function __construct(PublishRepository $publishRepo)
    {
        $this->publishRepository = $publishRepo;
    }

    /**
     * Display a listing of the Publish.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->publishRepository->pushCriteria(new RequestCriteria($request));
        $publishes = $this->publishRepository->all();

        return view('publishes.index')
            ->with('publishes', $publishes);
    }

    /**
     * Show the form for creating a new Publish.
     *
     * @return Response
     */
    public function create()
    {
        return view('publishes.create');
    }

    /**
     * Store a newly created Publish in storage.
     *
     * @param CreatePublishRequest $request
     *
     * @return Response
     */
    public function store(CreatePublishRequest $request)
    {
        $input = $request->all();

        $publish = $this->publishRepository->create($input);

        Flash::success('Publish saved successfully.');

        return redirect(route('publishes.index'));
    }

    /**
     * Display the specified Publish.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $publish = $this->publishRepository->findWithoutFail($id);

        if (empty($publish)) {
            Flash::error('Publish not found');

            return redirect(route('publishes.index'));
        }

        return view('publishes.show')->with('publish', $publish);
    }

    /**
     * Show the form for editing the specified Publish.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $publish = $this->publishRepository->findWithoutFail($id);

        if (empty($publish)) {
            Flash::error('Publish not found');

            return redirect(route('publishes.index'));
        }

        return view('publishes.edit')->with('publish', $publish);
    }

    /**
     * Update the specified Publish in storage.
     *
     * @param  int              $id
     * @param UpdatePublishRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePublishRequest $request)
    {
        $publish = $this->publishRepository->findWithoutFail($id);

        if (empty($publish)) {
            Flash::error('Publish not found');

            return redirect(route('publishes.index'));
        }

        $publish = $this->publishRepository->update($request->all(), $id);

        Flash::success('Publish updated successfully.');

        return redirect(route('publishes.index'));
    }

    /**
     * Remove the specified Publish from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $publish = $this->publishRepository->findWithoutFail($id);

        if (empty($publish)) {
            Flash::error('Publish not found');

            return redirect(route('publishes.index'));
        }

        $this->publishRepository->delete($id);

        Flash::success('Publish deleted successfully.');

        return redirect(route('publishes.index'));
    }
}
