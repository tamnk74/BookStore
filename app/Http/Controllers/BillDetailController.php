<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillDetailRequest;
use App\Http\Requests\UpdateBillDetailRequest;
use App\Repositories\BillDetailRepository;
use App\Repositories\BillRepository;
use App\Repositories\BookRepository;
use App\Repositories\StoreRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BillDetailController extends AppBaseController
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
        $this->billDetailRepository->pushCriteria(new RequestCriteria($request));
        $billDetails = $this->billDetailRepository->all();
        
        $this->billRepository->pushCriteria(new RequestCriteria($request));
        $bills = $this->billRepository->all();

        return view('bill_details.index')
            ->with([
                'billDetails' => $billDetails,
                'bills' => $bills
                ]);
    }

    /**
     * Show the form for creating a new BillDetail.
     *
     * @return Response
     */
    public function create()
    {
        $books = $this->bookRepository->all()->pluck('name', 'id');
        return view('bill_details.create')
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
            $price_amount = 0;
            for($i=0; $i<count($input['book_id']); $i++){
                $book = $this->bookRepository->findWithoutFail($input['book_id'][$i]);
                if (empty($book)) {
                    Flash::error('Book not found in store');
                    return redirect(route('billDetails.index'));
                }
                $price_amount += $book->price*$input['amount'][$i];
            }
            $bill = $this->billRepository->create([
                'client_name' => $input['client_name'],
                'price_amount' => $price_amount,
                'date' => \Carbon\Carbon::today()->format('Y-m-d')
            ]);
            for($i=0; $i<count($input['book_id']); $i++){
                $bookstore = $this->storeRepository->findWithoutFail($input['book_id'][$i]);
                if (empty($bookstore)) {
                    Flash::error('Book not found in store');

                    return redirect(route('billDetails.index'));
                }
                if ($bookstore->current_amount < $input['amount'][$i]) {

                    Flash::error('The amount of this book is not enough in store');

                    return redirect(route('billDetails.index'));
                }
                $billDetail = $this->billDetailRepository->create([
                    'book_id' => $input['book_id'][$i],
                    'amount' => $input['amount'][$i],
                    'bill_id' => $bill->id
                ]);
            }
            
            Flash::success('Bill Detail saved successfully.');
            return redirect(route('billDetails.index'));
        } 
       catch (ModelNotFoundException $saveException) {
            Flash::error('Error in create bill!');
            return redirect(route('billDetails.index'));
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

            return redirect(route('billDetails.index'));
        }

        return view('bill_details.show')->with('bill', $bill);
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

            return redirect(route('billDetails.index'));
        }

        return view('bill_details.edit')->with([
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

                return redirect(route('billDetails.index'));
            }
            
            foreach ($bill->billDetail as $billDetail) {
                $this->billDetailRepository->delete($billDetail->id);
            }
            
            $input = $request->all();
            $price_amount = 0;
            for($i=0; $i<count($input['book_id']); $i++){
                $book = $this->bookRepository->findWithoutFail($input['book_id'][$i]);
                if (empty($book)) {
                    Flash::error('Book not found in store');
                    return redirect(route('billDetails.index'));
                }
                $price_amount += $book->price*$input['amount'][$i];
            }
            $bill = $this->billRepository->update([
                'client_name' => $input['client_name'],
                'price_amount' => $price_amount,
                'date' => \Carbon\Carbon::today()->format('Y-m-d')
            ],  $id);
            for($i=0; $i<count($input['book_id']); $i++){
                $bookstore = $this->storeRepository->findWithoutFail($input['book_id'][$i]);
                if (empty($bookstore)) {
                    Flash::error('Book not found in store');

                    return redirect(route('billDetails.index'));
                }
                if ($bookstore->current_amount < $input['amount'][$i]) {

                    Flash::error('The amount of this book is not enough in store');

                    return redirect(route('billDetails.index'));
                }
                $billDetail = $this->billDetailRepository->create([
                    'book_id' => $input['book_id'][$i],
                    'amount' => $input['amount'][$i],
                    'bill_id' => $bill->id
                ]);
            }
         
            Flash::success('Bill Detail saved successfully.');
            return redirect(route('billDetails.index'));
        } 
        catch (ModelNotFoundException $saveException) {
            Flash::error('Error in create bill!');
            return redirect(route('billDetails.index'));
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
        //$bill->billDetail
        foreach ($bill->billDetail as $billDetail) {
            $this->billDetailRepository->delete($billDetail->id);
        }
        if (empty($bill)) {
            Flash::error('Bill Detail not found');

            return redirect(route('billDetails.index'));
        }

        $this->billRepository->delete($id);

        Flash::success('Bill Detail deleted successfully.');

        return redirect(route('billDetails.index'));
    }

    public function searchBook(Request $request){
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = DB::table('books')
                ->select("id","name")
                ->where('name','LIKE',"%$search%")
                ->get();
        }
        return response()->json($data);
    }
}
