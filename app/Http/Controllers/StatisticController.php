<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\ImportBook;
use App\Repositories\BillRepository;
use Carbon\Carbon;

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
            $date = Carbon::today()->format('Y-m-d');
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
    public function monthly(Request $request)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $input = request()->all();
        if (isset($input['date_picker'])) {
            $month = intval(explode("-", $input['date_picker'])[1]);
            $year = intval(explode("-", $input['date_picker'])[0]);
        }
        //dd($month."-".$year);
        $totalCost = Bill::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $month)
                    ->get()
                    ->sum('price_amount');
        $data['bill'] = Bill::getByMonth($year)->toArray();
        $data['import_book'] = ImportBook::getByMonth($year)->toArray();
        $data['bills'] = BillDetail::getByMonths($year)->toArray();
        $data['import_books'] = ImportBook::getByMonths($year)->toArray();
        $data['totalCost'] = $totalCost;
        $data['top_books'] = BillDetail::getTop5Books($year, $month)->toArray();
        $data['categories'] = BillDetail::getCategoriesByMonth($year, $month);
        $data['month'] = $month;
        $data['year'] = $year;
        //dd($data);
        return view('statistics.monthly')->with($data);
    }
    public function quarterly(Request $request)
    {
        $input = $request->all();
        if (!isset($input['quarter'])) {
            $quarter = date('Y').'Q'.(intval((date('n')-1)/3) + 1);
        } else {
            $quarter = $input['quarter'];
        }
        $elements = explode('Q', $quarter);
        $year = intval($elements[0]);
        $quarter = intval($elements[1]);
        
        $data['year'] = $year;
        $data['quarter'] = $quarter;
        
        $data['quatersList'] = ImportBook::getQuarterList();
        
        $data['quaterlyTotalBill'] = Bill::quarterTotal($year, $quarter);
        $data['quaterlyTotalImport'] = ImportBook::quarterTotal($year, $quarter);
        
        $data['categories'] = BillDetail::getCategoriesByQuarter($year, $quarter);
        
        $data['top_books'] = BillDetail::getTop10Books($year, $quarter)->toArray();
        
        $data['billGrowthIndexs'] = Bill::getGrowthIndex();
        $data['importGrowthIndexs'] = ImportBook::getGrowthIndex();
        //dd($data);
        return view('statistics.quarterly')->with($data);
    }
}
