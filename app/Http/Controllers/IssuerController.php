<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIssuerRequest;
use App\Http\Requests\UpdateIssuerRequest;
use App\Repositories\IssuerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class IssuerController extends AppBaseController
{
    /** @var  IssuerRepository */
    private $issuerRepository;

    public function __construct(IssuerRepository $issuerRepo)
    {
        $this->issuerRepository = $issuerRepo;
    }

    /**
     * Display a listing of the Issuer.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->issuerRepository->pushCriteria(new RequestCriteria($request));
        $issuers = $this->issuerRepository->paginate(15);

        return view('issuers.index')
            ->with('issuers', $issuers);
    }

    /**
     * Show the form for creating a new Issuer.
     *
     * @return Response
     */
    public function create()
    {
        return view('issuers.create');
    }

    /**
     * Store a newly created Issuer in storage.
     *
     * @param CreateIssuerRequest $request
     *
     * @return Response
     */
    public function store(CreateIssuerRequest $request)
    {
        $input = $request->all();

        $issuer = $this->issuerRepository->create($input);

        Flash::success('Issuer saved successfully.');

        return redirect(route('issuers.index'));
    }

    /**
     * Display the specified Issuer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $issuer = $this->issuerRepository->findWithoutFail($id);

        if (empty($issuer)) {
            Flash::error('Issuer not found');

            return redirect(route('issuers.index'));
        }

        return view('issuers.show')->with('issuer', $issuer);
    }

    /**
     * Show the form for editing the specified Issuer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $issuer = $this->issuerRepository->findWithoutFail($id);

        if (empty($issuer)) {
            Flash::error('Issuer not found');

            return redirect(route('issuers.index'));
        }

        return view('issuers.edit')->with('issuer', $issuer);
    }

    /**
     * Update the specified Issuer in storage.
     *
     * @param  int              $id
     * @param UpdateIssuerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIssuerRequest $request)
    {
        $issuer = $this->issuerRepository->findWithoutFail($id);

        if (empty($issuer)) {
            Flash::error('Issuer not found');

            return redirect(route('issuers.index'));
        }

        $issuer = $this->issuerRepository->update($request->all(), $id);

        Flash::success('Issuer updated successfully.');

        return redirect(route('issuers.index'));
    }

    /**
     * Remove the specified Issuer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $issuer = $this->issuerRepository->findWithoutFail($id);

        if (empty($issuer)) {
            Flash::error('Issuer not found');

            return redirect(route('issuers.index'));
        }

        $this->issuerRepository->delete($id);

        Flash::success('Issuer deleted successfully.');

        return redirect(route('issuers.index'));
    }
}
