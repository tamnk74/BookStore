<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Category;
use App\Models\Book;
use App\Models\Store;
use App\Repositories\StoreRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StoreController extends AppBaseController
{
    /** @var  StoreRepository */
    private $storeRepository;

    public function __construct(StoreRepository $storeRepo)
    {
        $this->storeRepository = $storeRepo;
    }

    /**
     * Display a listing of the Store.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->storeRepository->pushCriteria(new RequestCriteria($request));
        $categories = [null => 'Tất cả'];
        $key = '';
        $category_id = null;
        foreach(Category::all()->pluck('name','id') as $id => $name) {
            $categories[$id] = $name;
        }
        //Search form
        $stores = Store::leftjoin('books', 'books.id', 'book_id')
                ->leftjoin('authors', 'authors.id', 'author_id');
        $category_id = $request->input('category_id');
        $key = $request->input('key');
        $stores = $stores->where(function($query) use ($key, $category_id){
            $query->where('books.name','like', '%'.$key.'%');
            if($category_id != null) $query->where('category_id', $category_id);
        })
            ->orWhere(function($query) use ($key, $category_id){
                $query->where('authors.name','like', '%'.$key.'%');
                if($category_id != null) $query->where('category_id', $category_id);
            })
            ->orderBy('amount', 'desc')
            ->select('stores.*')->paginate(15);
        //dd(DB::getQueryLog());
        return view('stores.index', compact('stores', 'key', 'categories', 'category_id'));
    }

    /**
     * Show the form for creating a new Store.
     *
     * @return Response
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created Store in storage.
     *
     * @param CreateStoreRequest $request
     *
     * @return Response
     */
    public function store(CreateStoreRequest $request)
    {
        $input = $request->all();

        $store = $this->storeRepository->create($input);

        Flash::success('Store saved successfully.');

        return redirect(route('stores.index'));
    }

    /**
     * Display the specified Store.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $store = $this->storeRepository->findWithoutFail($id);

        if (empty($store)) {
            Flash::error('Store not found');

            return redirect(route('stores.index'));
        }

        return view('stores.show')->with('store', $store);
    }

    /**
     * Show the form for editing the specified Store.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $store = $this->storeRepository->findWithoutFail($id);

        if (empty($store)) {
            Flash::error('Store not found');

            return redirect(route('stores.index'));
        }

        return view('stores.edit')->with('store', $store);
    }

    /**
     * Update the specified Store in storage.
     *
     * @param  int              $id
     * @param UpdateStoreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStoreRequest $request)
    {
        $store = $this->storeRepository->findWithoutFail($id);

        if (empty($store)) {
            Flash::error('Store not found');

            return redirect(route('stores.index'));
        }

        $store = $this->storeRepository->update($request->all(), $id);

        Flash::success('Store updated successfully.');

        return redirect(route('stores.index'));
    }

    /**
     * Remove the specified Store from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $store = $this->storeRepository->findWithoutFail($id);

        if (empty($store)) {
            Flash::error('Store not found');

            return redirect(route('stores.index'));
        }

        $this->storeRepository->delete($id);

        Flash::success('Store deleted successfully.');

        return redirect(route('stores.index'));
    }
}
