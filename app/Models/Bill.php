<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class Bill
 * @package App\Models
 * @version February 27, 2017, 9:06 am UTC
 */
class Bill extends Model
{
    use SoftDeletes;

    public $table = 'bills';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'client_name',
        'client_address',
        'user_id',
        'total_price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'client_name' => 'string',
        'client_address' => 'string',
        'total_price' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_name' => 'required',
        'client_address' => 'required'
    ];
    
    public function billdetail()
    {
        return $this->hasMany(BillDetail::class);
    }

    public function  user(){
        return $this->belongsTo(User::class);
    }
    /**
     * Get all today's bills.
     *
     * @param string $date input date
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getByDate($date)
    {
        return self::whereRaw('date(created_at) = \''.$date.'\'')
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
    
    /**
     * Get all today's bills.
     *
     * @param string $date input date
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getRevenueByMonths($year)
    {
        return self::whereYear('created_at', $year)
                    ->select(DB::raw('MONTH(created_at) month, sum(total_price) as total'))
                    ->groupby('month')
                    ->orderBy('month', 'asc')
                    ->get();
    }

    /**
     * Get all today's bills.
     *
     * @param string $date input date
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function getRevenueByMonth($year, $month)
    {
        return self::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get()
            ->sum('total_price');
    }

    /**
     * Get renevue by quarter.
     *
     * @param int $year    year
     * @param int $quarter quarter
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function quarterRenevue($year, $quarter)
    {
        return self::selectRaw('month(created_at) as `month`, sum(total_price) as revenue')
                   ->whereRaw('quarter(created_at) = '.$quarter.' and year(created_at) = '.$year)
                   ->groupBy('month')
                   ->orderByRaw('month asc')
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
    public static function quarters($year, $quarter)
    {
        return self::selectRaw('quarter(created_at) as `quarter`, year(created_at) as year, sum(total_price) as revenue')
            ->whereRaw('year(created_at) >= '.max($year-2, 2016))
            ->groupBy('quarter', 'year')
            ->orderByRaw('year asc, quarter asc')
            ->get();
    }
}
