<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * Class BillDetail
 * @package App\Models
 * @version February 27, 2017, 9:04 am UTC
 */
class BillDetail extends Model {

    use SoftDeletes;

    const PERCENT = 100;

    public $table = 'bill_details';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'book_id',
        'amount',
        'bill_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'book_id' => 'integer',
        'amount' => 'integer',
        'bill_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'book_id' => 'required',
        'amount' => 'required',
    ];

    public function bill() {
        return $this->belongsTo('App\Bill');
    }

    public function book() {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function getBooks() {
        return $this->id;
    }

    /**
     * Get top hot 5 books daily
     *
     * @param int $year  determine specific year
     * @param int $month determine specific month
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getTop5BookByDate($date) {
        return self::leftJoin('books', 'books.id', '=', 'bill_details.book_id')
                        ->select('name', DB::raw('SUM(amount) as sum'))
                        ->whereDate('bill_details.created_at', $date)
                        ->groupBy('name')
                        ->orderBy('sum', 'desc')
                        ->limit(5)
                        ->get()
                        ->toArray();
    }

    /**
     * Get all today's books.
     *
     * @param string $date input date
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getBooksByDate($date) {
        return self::join('books', 'bill_details.book_id', '=', 'books.id')
                        ->select('books.id', 'books.name', DB::raw('sum(bill_details.amount) as total'))
                        ->whereDate('bill_details.created_at', $date)
                        ->groupBy('books.id', 'books.name')
                        ->orderBy('total', 'desc')
                        ->get()
                        ->toArray();
    }

    /**
     * Get top hot 5 books monthly
     *
     * @param int $year  determine specific year
     * @param int $month determine specific month
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getTop5Books($year, $month) {
        return self::join('books', 'bill_details.book_id', '=', 'books.id')
                        ->select('books.id', 'books.name', DB::raw('sum(bill_details.amount) as total'))
                        ->whereYear('bill_details.created_at', $year)
                        ->whereMonth('bill_details.created_at', $month)
                        ->groupBy('books.id', 'books.name')
                        ->orderBy('total', 'desc')
                        ->get();
    }
    /**
     * Get top hot 5 books monthly
     *
     * @param int $year  determine specific year
     * @param int $month determine specific month
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getTop10Books($year, $quarter) {
        return self::join('books', 'bill_details.book_id', '=', 'books.id')
                        ->select('books.id', 'books.name', DB::raw('sum(bill_details.amount) as total'))
                        ->whereYear('bill_details.created_at', $year)
                        ->whereRaw('QUARTER(bill_details.created_at) = '.$quarter)
                        ->groupBy('books.id', 'books.name')
                        ->orderBy('total', 'desc')
                        ->get();
    }
    /**
     * Get all today's bills.
     *
     * @param string $date input date
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getByMonths($year)
    {
        return self::whereYear('created_at', $year)
            ->select(DB::raw('MONTH(created_at) month, sum(amount) as total'))
            ->groupby('month')
            ->orderBy('month', 'asc')
            ->get();
    }
    
    public static function totalAmountByMonth($year, $month)
    {
        return self::whereYear('created_at', $year)
                   ->whereMonth('created_at', $month)
                   ->sum('amount');
    }
    
    public static function totalAmountByQuarter($year, $quarter)
    {
        return self::whereRaw('QUARTER(bill_details.created_at) = '.$quarter.' and year(bill_details.created_at) = '.$year)->sum('bill_details.amount');
    }
    /**
     * Get daily percentage of categories.
     *
     * @param string $date input date
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getCategoriesByMonth($year, $month) {
        return self::join('books', 'bill_details.book_id', '=', 'books.id')
                        ->join('categories', 'books.category_id', '=', 'categories.id')
                        ->whereYear('bill_details.created_at', $year)
                        ->whereMonth('bill_details.created_at', $month)
                        ->select('categories.id', 'categories.name', DB::raw('round(sum(bill_details.amount) / ' . self::totalAmountByMonth($year, $month) . ' * ' . 100 . ', 2) as percentage'))
                        ->groupBy('categories.id', 'categories.name')
                        ->get();
    }
    
    /**
     * Get daily percentage of categories.
     *
     * @param string $date input date
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getCategoriesByQuarter($year, $quarter) {
        return self::join('books', 'bill_details.book_id', '=', 'books.id')
                        ->join('categories', 'books.category_id', '=', 'categories.id')
                        ->whereRaw('QUARTER(bill_details.created_at) = '.$quarter.' and year(bill_details.created_at) = '.$year)
                        ->select('categories.id', 'categories.name', DB::raw('round(sum(bill_details.amount) / ' . self::totalAmountByQuarter($year, $quarter) . ' * ' . 100 . ', 2) as percentage'))
                        ->groupBy('categories.id', 'categories.name')
                        ->get();
    }
    
}
