<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BillDetail
 * @package App\Models
 * @version February 27, 2017, 9:04 am UTC
 */
class BillDetail extends Model
{
    use SoftDeletes;

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
        'bill_id' => 'required'
    ];

    
}
