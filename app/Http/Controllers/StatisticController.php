<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\BillDetail;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function daily(Request $request)
    {
        if (!isset($request['date-picker'])) {
            $data['date'] = date(\Config::get('common.DATE_DMY_FORMAT'), time());
        } else {
            $data['date'] = $request['date-picker'];
        }
        $date = \Carbon\Carbon::today()->format('Y-m-d');

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
