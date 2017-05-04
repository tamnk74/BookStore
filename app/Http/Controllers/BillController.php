<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillDetailRequest;
use App\Http\Requests\UpdateBillDetailRequest;
use App\Models\Bill;
use App\Models\Profile;
use App\Models\Store;
use App\Repositories\BillDetailRepository;
use App\Repositories\BillRepository;
use App\Repositories\BookRepository;
use App\Repositories\StoreRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class BillController extends AppBaseController
{
    /** @var  BillDetailRepository */
    private $billDetailRepository;
    private $bookRepository;
    private $billRepository;
    private $storeRepository;

    public function __construct(
        BillDetailRepository $billDetailRepo,
        BookRepository $bookRepo,
        BillRepository $billRepo,
        StoreRepository $storeRepo)
    {
        $this->billDetailRepository = $billDetailRepo;
        $this->bookRepository = $bookRepo;
        $this->billRepository = $billRepo;
        $this->storeRepository = $storeRepo;
    }

    /**
     * Display a listing of the BillDetail.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->billRepository->pushCriteria(new RequestCriteria($request));
        $bills = $this->billRepository->paginate(30);

        return view('bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new BillDetail.
     *
     * @return Response
     */
    public function create()
    {
        $books = $this->bookRepository->all()->pluck('name', 'id');
        return view('bills.create')
            ->with('books', $books);;
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
        try {
            $input = $request->all();
            $total_price = 0;
            for($i=0; $i<count($input['book_id']); $i++){
                $book = $this->bookRepository->findWithoutFail($input['book_id'][$i]);
                $bookstore = $this->storeRepository->findWithoutFail($input['book_id'][$i]);
                if (empty($book)) {
                    Flash::error('Book not found in store');
                    return redirect(route('bills.index'));
                }
                if (empty($bookstore)) {
                    Flash::error('Book not found in store');
                    return redirect(route('bills.create'));
                }
                if ($bookstore->amount < $input['amount'][$i]) {
                    Flash::error('The amount of the book '.$bookstore->book->name.' is not enough in store');
                    return redirect(route('bills.create'));
                }
                $total_price += $book->price*((100-$book->sale)/100)*$input['amount'][$i];
            }
            $input['total_price'] = $total_price;
            $input['date'] = \Carbon\Carbon::today()->format('Y-m-d');
            $input['user_id'] = Auth::user()->id;
            $bill = $this->billRepository->create($input);

            for($i=0; $i<count($input['book_id']); $i++){
                $billDetail = $this->billDetailRepository->create([
                    'book_id' => $input['book_id'][$i],
                    'amount' => $input['amount'][$i],
                    'bill_id' => $bill->id
                ]);
            }

            Flash::success('Bill saved successfully.');
            return redirect(route('bills.show', [$bill->id]));
        }
        catch (ModelNotFoundException $saveException) {
            Flash::error('Error in create bill!');
            return redirect(route('bills.index'));
        }
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
        $bill = $this->billRepository->findWithoutFail($id);

        if (empty($bill)) {
            Flash::error('Bill not found');

            return redirect(route('bills.index'));
        }
        $profile = Profile::where('user_id', $bill->user_id)->first();
        $user = User::find($bill->user->id);
        return view('bills.show', compact('bill', 'profile', 'user'));
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
        $bill = $this->billRepository->findWithoutFail($id);
        $books = $this->bookRepository->all()->pluck('name', 'id');
        if (empty($bill)) {
            Flash::error('Bill not found');

            return redirect(route('bills.index'));
        }

        return view('bills.edit')->with([
            'bill' => $bill,
            'books' => $books
        ]);
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
        try {
            $bill = $this->billRepository->findWithoutFail($id);

            if (empty($bill)) {
                Flash::error('Bill not found');

                return redirect(route('bills.index'));
            }

            foreach ($bill->billDetail as $billDetail) {
                $this->billDetailRepository->delete($billDetail->id);
            }

            $input = $request->all();
            $total_price = 0;
            for($i=0; $i<count($input['book_id']); $i++){
                $book = $this->bookRepository->findWithoutFail($input['book_id'][$i]);
                if (empty($book)) {
                    Flash::error('Book not found in store');
                    return redirect(route('bills.index'));
                }
                $total_price += $book->price*$input['amount'][$i];
            }
            $bill = $this->billRepository->update([
                'client_name' => $input['client_name'],
                'total_price' => $total_price,
                'date' => \Carbon\Carbon::today()->format('Y-m-d')
            ],  $id);
            for($i=0; $i<count($input['book_id']); $i++){
                $bookstore = $this->storeRepository->findWithoutFail($input['book_id'][$i]);
                if (empty($bookstore)) {
                    Flash::error('Book not found in store');

                    return redirect(route('bills.index'));
                }
                if ($bookstore->amount < $input['amount'][$i]) {

                    Flash::error('The amount of this book is not enough in store');

                    return redirect(route('bills.index'));
                }
                $billDetail = $this->billDetailRepository->create([
                    'book_id' => $input['book_id'][$i],
                    'amount' => $input['amount'][$i],
                    'bill_id' => $bill->id
                ]);
            }

            Flash::success('Bill saved successfully.');
            return redirect(route('bills.show', [$id]));
        }
        catch (ModelNotFoundException $saveException) {
            Flash::error('Error in create bill!');
            return redirect(route('bills.index'));
        }
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
        $bill = $this->billRepository->findWithoutFail($id);

        if (empty($bill)) {
            Flash::error('Bill not found');

            return redirect(route('bills.index'));
        }

        //$bill->billDetail
        foreach ($bill->billDetail as $billDetail) {
            $this->billDetailRepository->delete($billDetail->id);
        }

        $this->billRepository->delete($id);

        Flash::success('Bill has been deleted successfully.');

        return redirect(route('bills.index'));
    }
}
