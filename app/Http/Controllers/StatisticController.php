<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\ImportBook;
use App\Repositories\BillRepository;


use Illuminate\Http\Request;

class StatisticController extends Controller
{
    private $billRepository;
    public function __construct(BillRepository $billRepo)
    {
        $this->billRepository = $billRepo;
    }
    public function daily(Request $request)
    {
        if (!isset($request['date-picker'])) {
            $date = \Carbon\Carbon::today()->format('Y-m-d');
        } else {
            $date = $request['date-picker'];
        }
        $data['date'] = $date; 
        $data['import_books'] = ImportBook::getByDay($date);
        $data['bills'] = Bill::getByDate($date);
        $data['top_books_details'] = BillDetail::getBooksByDate($date);
        $data['top_book'] = BillDetail::getTop5BookByDate($date);
        //dd($data);
        return view('statistics.daily')->with($data);
    }
    public function monthly()
    {
        return view('statistics.monthly');
    }
    public function quarterly()
    {
        return view('statistics.quarterly');
    }
}
