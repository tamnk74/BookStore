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
    public static function getByMonth($year)
    {
        return self::whereYear('created_at', $year)
                    ->select(DB::raw('MONTH(created_at) month, sum(total_price) as total'))
                    ->groupby('month')
                    ->orderBy('month', 'asc')
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
        return self::selectRaw('year(created_at) as `year`, monthname(created_at) as `month`, sum(total_price) as total')
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
        $firstMonth = self::selectRaw('year(created_at) as `year`, quarter(created_at) as `quarter`, sum(total_price) as sum')
                          ->groupBy('year', 'quarter')
                          ->orderByRaw('year(created_at) asc , QUARTER(created_at) asc')
                          ->first();
        $firstMonth = ($firstMonth == null) ? $firstMonth =0 : $firstMonth->sum;
        return self::selectRaw('year(created_at) as `year`, quarter(created_at) as `quarter`, round((sum(total_price) / '.$firstMonth.') - 1, 2) as `index`')
                    ->groupBy('year', 'quarter')
                    ->orderByRaw('`year` desc, `quarter` desc')
                    ->get();
    }
}
