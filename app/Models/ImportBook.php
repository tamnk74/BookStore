<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'amount' => 'required numberic',
        'date' => 'required',
        'buy_price' => 'required numberic',
        'sell_price' => 'required'
    ];

    
}
