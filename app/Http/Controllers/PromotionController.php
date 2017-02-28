<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Repositories\PromotionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PromotionController extends AppBaseController
{
    /** @var  PromotionRepository */
    private $promotionRepository;

    public function __construct(PromotionRepository $promotionRepo)
    {
        $this->promotionRepository = $promotionRepo;
    }

    /**
     * Display a listing of the Promotion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->promotionRepository->pushCriteria(new RequestCriteria($request));
        $promotions = $this->promotionRepository->all();

        return view('promotions.index')
            ->with('promotions', $promotions);
    }

    /**
     * Show the form for creating a new Promotion.
     *
     * @return Response
     */
    public function create()
    {
        return view('promotions.create');
    }

    /**
     * Store a newly created Promotion in storage.
     *
     * @param CreatePromotionRequest $request
     *
     * @return Response
     */
    public function store(CreatePromotionRequest $request)
    {
        $input = $request->all();

        $promotion = $this->promotionRepository->create($input);

        Flash::success('Promotion saved successfully.');

        return redirect(route('promotions.index'));
    }

    /**
     * Display the specified Promotion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $promotion = $this->promotionRepository->findWithoutFail($id);

        if (empty($promotion)) {
            Flash::error('Promotion not found');

            return redirect(route('promotions.index'));
        }

        return view('promotions.show')->with('promotion', $promotion);
    }

    /**
     * Show the form for editing the specified Promotion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $promotion = $this->promotionRepository->findWithoutFail($id);

        if (empty($promotion)) {
            Flash::error('Promotion not found');

            return redirect(route('promotions.index'));
        }

        return view('promotions.edit')->with('promotion', $promotion);
    }

    /**
     * Update the specified Promotion in storage.
     *
     * @param  int              $id
     * @param UpdatePromotionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePromotionRequest $request)
    {
        $promotion = $this->promotionRepository->findWithoutFail($id);

        if (empty($promotion)) {
            Flash::error('Promotion not found');

            return redirect(route('promotions.index'));
        }

        $promotion = $this->promotionRepository->update($request->all(), $id);

        Flash::success('Promotion updated successfully.');

        return redirect(route('promotions.index'));
    }

    /**
     * Remove the specified Promotion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $promotion = $this->promotionRepository->findWithoutFail($id);

        if (empty($promotion)) {
            Flash::error('Promotion not found');

            return redirect(route('promotions.index'));
        }

        $this->promotionRepository->delete($id);

        Flash::success('Promotion deleted successfully.');

        return redirect(route('promotions.index'));
    }
}
