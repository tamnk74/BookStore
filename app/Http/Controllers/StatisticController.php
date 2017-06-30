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
        $date = "";
        if (!isset($request['date-picker'])) {
            $date = Carbon::today();
        } else {
            $date = Carbon::createFromFormat('d/m/Y', $request['date-picker']);
        }
        $dateString = $date->toDateString();
        $importBooks = ImportBook::getByDay($dateString);
        $bills = Bill::getByDate($dateString);
        $billsDetails = BillDetail::getBooksByDate($dateString);
        $topBook = BillDetail::getTopBookByDate($dateString);
        //dd($data);
        return view('statistics.daily')->with(compact('date', 'importBooks', 'bills', 'billsDetails', 'topBook'));
    }
    public function monthly(Request $request)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $input = request()->all();
        if (isset($input['date_picker'])) {
            $month = intval(explode("/", $input['date_picker'])[0]);
            $year = intval(explode("/", $input['date_picker'])[1]);
        }
        //dd($month."-".$year);
        $report['revenue'] = Bill::getRevenueByMonth($year, $month);
        $report['sale'] = BillDetail::getSaleByMonth($year, $month);
        $report['cost'] = ImportBook::getCostByMonth($year, $month);
        $report['import'] = ImportBook::getImportByMonth($year, $month);

        $revenues = Bill::getRevenueByMonths($year);
        $costs = ImportBook::getCostByMonths($year);
        $sales = BillDetail::getSalesByMonths($year);

        $totalImport = ImportBook::getTotalByMonths($year, $month);
        $topBooks = BillDetail::getTopBookByMonth($year, $month);
        $categories = BillDetail::getCategoriesByMonth($year, $month);
        return view('statistics.monthly', compact('month', 'year', 'report', 'revenues', 'costs', 'sales',
            'totalImport', 'categories', 'topBooks'));
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
        
        $quatersList = ImportBook::getQuarterList();
        
        $quarterRenevue = Bill::quarterRenevue($year, $quarter);
        $quarterCost = ImportBook::quarterCost($year, $quarter);

        $quaterlyTotalBill = BillDetail::quarterTotal($year, $quarter);
        $quaterlyTotalImport = ImportBook::quarterTotal($year, $quarter);
        
        $categories = BillDetail::getCategoriesByQuarter($year, $quarter);
        $categoriesPercent = BillDetail::getPercentCategoriesByQuarter($year, $quarter);

        $topBooks = BillDetail::getTopBookByQuarters($year, $quarter);

        $billQuarter = Bill::quarters($year, $quarter);
        $importQuarter = ImportBook::quarters($year, $quarter);
        $revenueQuarters = [];
        for($i =0; $i< count($billQuarter); $i++){
            $revenueQuarters[$i]['y'] = $billQuarter[$i]['year'].' Q'.$billQuarter[$i]['quarter'];
            $revenueQuarters[$i]['revenue'] = $billQuarter[$i]['revenue'];
            $revenueQuarters[$i]['cost'] = $importQuarter[$i]['cost'];
        }
        return view('statistics.quarterly', compact('quarter', 'year', 'quatersList', 'revenueQuarters',
            'quaterlyTotalBill', 'quaterlyTotalImport', 'quarterRenevue', 'quarterCost','categories',
            'categoriesPercent',  'topBooks' ));
    }
}
