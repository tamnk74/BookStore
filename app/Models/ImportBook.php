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
        'amount',
        'date',
        'buy_price',
        'sell_price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'book_id' => 'integer',
        'amount' => 'integer',
        'date' => 'date',
        'buy_price' => 'integer',
        'sell_price' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'book_id' => 'required',
        'amount' => 'required|numeric',
        'buy_price' => 'required|numeric',
        'sell_price' => 'numeric'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    
    public static function getByDay($date)
    {
        return self::whereDate('created_at', $date)->get();
    }
    
    public static function getByMonth($year)
    {
        return self::whereYear('created_at', $year)
                    ->select(DB::raw('MONTH(created_at) month, sum(buy_price) as total'))
                    ->groupby('month')
                    ->orderBy('month', 'asc')
                    ->get();
    }

    public static function getByMonths($year)
    {
        return self::whereYear('created_at', $year)
            ->select(DB::raw('MONTH(created_at) month, sum(amount) as total'))
            ->groupby('month')
            ->orderBy('month', 'asc')
            ->get();
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
     * Get total cost by quarter.
     *
     * @param int $year    year
     * @param int $quarter quarter
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function quarterTotal($year, $quarter)
    {
        return self::selectRaw('year(created_at) as `year`, monthname(created_at) as `month`, sum(amount) as total')
                   ->whereRaw('QUARTER(created_at) = '.$quarter.' and year(created_at) = '.$year)
                   ->groupBy('year', 'month')
                   ->orderByRaw('`year` desc, `month` asc')
                   ->get();
    }
    
    /**
     * Get index by quarter.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getGrowthIndex()
    {
        $firstMonth = self::selectRaw('year(created_at) as `year`, quarter(created_at) as `quarter`, sum(buy_price) as sum')
                          ->groupBy('year', 'quarter')
                          ->orderByRaw('year(created_at) asc , QUARTER(created_at) asc')
                          ->first();
        $firstMonth = ($firstMonth == null) ? $firstMonth =0 : $firstMonth->sum;

        return self::selectRaw('year(created_at) as `year`, quarter(created_at) as `quarter`, round((sum(buy_price) - '.$firstMonth.')/'.$firstMonth.', 2) as `index`')
                   ->groupBy('year', 'quarter')
                   ->orderByRaw('`year` desc, `quarter` desc');
    }
}
