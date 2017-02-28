<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillDetailRequest;
use App\Http\Requests\UpdateBillDetailRequest;
use App\Repositories\BillDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BillDetailController extends AppBaseController
{
    /** @var  BillDetailRepository */
    private $billDetailRepository;

    public function __construct(BillDetailRepository $billDetailRepo)
    {
        $this->billDetailRepository = $billDetailRepo;
    }

    /**
     * Display a listing of the BillDetail.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->billDetailRepository->pushCriteria(new RequestCriteria($request));
        $billDetails = $this->billDetailRepository->all();

        return view('bill_details.index')
            ->with('billDetails', $billDetails);
    }

    /**
     * Show the form for creating a new BillDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('bill_details.create');
    }

    /**
     * Store a newly created BillDetail in storage.
     *
     * @param CreateBillDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateBillDetailRequest $request)
    {
        $input = $request->all();

        $billDetail = $this->billDetailRepository->create($input);

        Flash::success('Bill Detail saved successfully.');

        return redirect(route('billDetails.index'));
    }

    /**
     * Display the specified BillDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $billDetail = $this->billDetailRepository->findWithoutFail($id);

        if (empty($billDetail)) {
            Flash::error('Bill Detail not found');

            return redirect(route('billDetails.index'));
        }

        return view('bill_details.show')->with('billDetail', $billDetail);
    }

    /**
     * Show the form for editing the specified BillDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $billDetail = $this->billDetailRepository->findWithoutFail($id);

        if (empty($billDetail)) {
            Flash::error('Bill Detail not found');

            return redirect(route('billDetails.index'));
        }

        return view('bill_details.edit')->with('billDetail', $billDetail);
    }

    /**
     * Update the specified BillDetail in storage.
     *
     * @param  int              $id
     * @param UpdateBillDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBillDetailRequest $request)
    {
        $billDetail = $this->billDetailRepository->findWithoutFail($id);

        if (empty($billDetail)) {
            Flash::error('Bill Detail not found');

            return redirect(route('billDetails.index'));
        }

        $billDetail = $this->billDetailRepository->update($request->all(), $id);

        Flash::success('Bill Detail updated successfully.');

        return redirect(route('billDetails.index'));
    }

    /**
     * Remove the specified BillDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $billDetail = $this->billDetailRepository->findWithoutFail($id);

        if (empty($billDetail)) {
            Flash::error('Bill Detail not found');

            return redirect(route('billDetails.index'));
        }

        $this->billDetailRepository->delete($id);

        Flash::success('Bill Detail deleted successfully.');

        return redirect(route('billDetails.index'));
    }
}
