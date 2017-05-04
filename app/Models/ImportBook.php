<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * Class ImportBook
 * @package App\Models
 * @version February 27, 2017, 8:57 am UTC
 */
class ImportBook extends Model
{
    use SoftDeletes;

    public $table = 'import_books';
    

    protected $dates = ['deleted_at'];

    public $fillable = [
        'book_id',
        'user_id',
        'supplier_id',
        'amount',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'book_id' => 'integer',
        'amount' => 'integer',
        'price' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'book_id' => 'required',
        'supplier_id' => 'required',
        'amount' => 'required|numeric',
        'price' => 'required|numeric'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    
    public static function getByDay($date)
    {
        return self::whereDate('created_at', $date)->get();
    }
    
    public static function getCostByMonths($year)
    {
        return self::whereYear('created_at', $year)
                    ->select(DB::raw('MONTH(created_at) month, sum(price) as total'))
                    ->groupby('month')
                    ->orderBy('month', 'asc')
                    ->get();
    }

    public static function getTotalByMonths($year)
    {
        return self::whereYear('created_at', $year)
            ->select(DB::raw('MONTH(created_at) month, sum(amount) as total'))
            ->groupby('month')
            ->orderBy('month', 'asc')
            ->get();
    }

    public static function getCostByMonth($year, $month)
    {
        return self::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get()
            ->sum('price');

    }

    public static function getImportByMonth($year, $month)
    {
        return self::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get()
            ->sum('amount');
    }

    /**
     * Get all order amount by quarter.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getQuarterList()
    {
        return self::selectRaw('year(created_at) as `year`, quarter(created_at) as `quarter`')
                    ->groupBy('year', 'quarter')
                    ->orderByRaw('`year` desc, `quarter` desc')
                    ->get();
    }
    
    /**
     * Get total by quarter.
     *
     * @param int $year    year
     * @param int $quarter quarter
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function quarterTotal($year, $quarter)
    {
        return self::selectRaw('month(created_at) as `month`, sum(amount) as total')
                   ->whereRaw('quarter(created_at) = '.$quarter.' and year(created_at) = '.$year)
                   ->groupBy('month')
                   ->orderByRaw('month asc')
                   ->get();
    }

    /**
     * Get total cost by quarter.
     *
     * @param int $year    year
     * @param int $quarter quarter
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function quarterCost($year, $quarter)
    {
        return self::selectRaw('month(created_at) as `month`, sum(price) as cost')
                   ->whereRaw('quarter(created_at) = '.$quarter.' and year(created_at) = '.$year)
                   ->groupBy('month')
                   ->orderByRaw('month asc')
                   ->get();
    }

    /**
     * Get total by each quarter.
     *
     * @param int $year    year
     * @param int $quarter quarter
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function quarters($year, $quarter)
    {
        return self::selectRaw('quarter(created_at) as `quarter`, year(created_at) as year, sum(price) as cost')
            ->whereRaw('year(created_at) >= '.max($year-2, 2016))
            ->groupBy('quarter', 'year')
            ->orderByRaw('year asc', 'quarter asc')
            ->get();
    }
}
