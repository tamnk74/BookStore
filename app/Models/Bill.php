<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'price_amount',
        'date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'client_name' => 'string',
        'price_amount' => 'integer',
        'date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_name' => 'price_amount integer:unsigned text',
        'price_amount' => 'required',
        'date' => 'required'
    ];

    
}