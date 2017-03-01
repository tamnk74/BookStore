<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Promotion
 * @package App\Models
 * @version February 27, 2017, 8:23 am UTC
 */
class Promotion extends Model
{
    use SoftDeletes;

    public $table = 'promotions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'book_id',
        'level'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'book_id' => 'integer',
        'level' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'book_id' => 'required'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    
}
