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
        $bills = Bill::orderBy('created_at', 'desc')->paginate(30);

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
            $bookPrice =[];
            for($i=0; $i<count($input['book_id']); $i++){
                $book = $this->bookRepository->findWithoutFail($input['book_id'][$i]);
                $bookstore = $this->storeRepository->findWithoutFail($input['book_id'][$i]);
                if (empty($book)) {
                    Flash::error('Sách không tìm thấy trong cửa hàng');
                    return redirect(route('bills.index'));
                }
                if (empty($bookstore)) {
                    Flash::error('Sách không tìm thấy trong cửa hàng');
                    return redirect(route('bills.create'));
                }
                if ($bookstore->amount < $input['amount'][$i]) {
                    Flash::error('Số lượng sách '.$bookstore->book->name.' không đủ trong cửa hàng');
                    return redirect(route('bills.create'));
                }
                $bookPrice[$i] = $book->price*((100-$book->sale)/100);
                 $total_price += $bookPrice[$i]*$input['amount'][$i];
            }
            $input['total_price'] = $total_price;
            $input['user_id'] = Auth::user()->id;
            $bill = $this->billRepository->create($input);

            for($i=0; $i<count($input['book_id']); $i++){
                $billDetail = $this->billDetailRepository->create([
                    'book_id' => $input['book_id'][$i],
                    'amount' => $input['amount'][$i],
                    'price' => $bookPrice[$i],
                    'bill_id' => $bill->id
                ]);
                if($billDetail != null){
                    $store = Store::where('book_id', $billDetail->book_id)->first();
                    $store->update(['amount' => $store->amount - $billDetail->amount]);
                }
            }

            Flash::success('Lưu hóa đơn thành công');
            return redirect(route('bills.show', [$bill->id]));
        }
        catch (ModelNotFoundException $saveException) {
            Flash::error('Lỗi trong khi tạo hóa đơn');
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
            Flash::error('Không tìm thấy hóa đơn');

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
            Flash::error('Không tìm thấy hóa đơn');

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
            $bookPrice = [];
            if (empty($bill)) {
                Flash::error('Không tìm thấy hóa đơn');

                return redirect(route('bills.index'));
            }
            // Delete old bill details
            foreach ($bill->billDetail as $billDetail) {
                $book_id = $billDetail->book_id;
                $oldNumber = $billDetail->amount;
                $status = $this->billDetailRepository->delete($billDetail->id);
                if($status == 1) {
                    $store = Store::where('book_id', $book_id)->first();
                    $store->update(['amount' => $store->amount + $oldNumber]);
                }
            }

            $input = $request->all();
            //Calculate total price
            $total_price = 0;
            for($i=0; $i<count($input['book_id']); $i++){
                $book = $this->bookRepository->findWithoutFail($input['book_id'][$i]);
                $bookstore = $this->storeRepository->findWithoutFail($input['book_id'][$i]);
                if (empty($book)) {
                    Flash::error('Sách không tìm thấy trong cửa hàng');
                    return redirect(route('bills.index'));
                }
                if (empty($bookstore)) {
                    Flash::error('Sách không tìm thấy trong cửa hàng');
                    return redirect(route('bills.create'));
                }
                if ($bookstore->amount < $input['amount'][$i]) {
                    Flash::error('Số lượng sách '.$bookstore->book->name.' không đủ trong cửa hàng');
                    return redirect(route('bills.create'));
                }
                $bookPrice[$i] = $book->price*((100-$book->sale)/100);
                $total_price += $bookPrice[$i]*$input['amount'][$i];
            }
            //create bill
            $input['total_price'] = $total_price;
            $input['user_id'] = Auth::user()->id;
            $bill = $this->billRepository->update($input,  $id);
            //Create bill details
            for($i=0; $i<count($input['book_id']); $i++){
                $bookstore = $this->storeRepository->findWithoutFail($input['book_id'][$i]);
                if (empty($bookstore)) {
                    Flash::error('Sách không tìm thấy trong cửa hàng');

                    return redirect(route('bills.index'));
                }
                $billDetail = $this->billDetailRepository->create([
                    'book_id' => $input['book_id'][$i],
                    'amount' => $input['amount'][$i],
                    'price' => $bookPrice[$i],
                    'bill_id' => $bill->id
                ]);
                if($billDetail != null){
                    $store = Store::where('book_id', $billDetail->book_id)->first();
                    $store->update(['amount' => $store->amount - $billDetail->amount]);
                }
            }

            Flash::success('Lưu hóa đơn thành công.');
            return redirect(route('bills.show', [$id]));
        }
        catch (ModelNotFoundException $saveException) {
            Flash::error('Lỗi trong khi tạo hóa đơn');
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
            Flash::error('Không tìm thấy hóa đơn');

            return redirect(route('bills.index'));
        }

        // Delete old bill details
        foreach ($bill->billDetail as $billDetail) {
            $book_id = $billDetail->book_id;
            $oldNumber = $billDetail->amount;
            $status = $this->billDetailRepository->delete($billDetail->id);
            if($status == 1) {
                $store = Store::where('book_id', $book_id)->first();
                $store->update(['amount' => $store->amount + $oldNumber]);
            }
        }

        $this->billRepository->delete($id);

        Flash::success('Hóa đơn vừa được xóa thành công');

        return redirect(route('bills.index'));
    }
}
