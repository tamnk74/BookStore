<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Book
 * @package App\Models
 * @version February 27, 2017, 8:14 am UTC
 */
class Book extends Model
{
    use SoftDeletes;

    public $table = 'books';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'author_id',
        'publish_id',
        'price',
        'image',
        'category_id',
        'type_id',
        'publishing_year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'author_id' => 'integer',
        'publish_id' => 'integer',
        'price' => 'integer',
        'image' => 'string',
        'category_id' => 'integer',
        'type_id' => 'integer',
        'publishing_year' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'author_id' => 'required',
        'publish_id' => 'required',
        'price' => 'reruired',
        'image' => 'required',
        'category_id' => 'required',
        'type_id' => 'required',
        'publishing_year' => 'required numeric min:1900 max:2100'
    ];

    
}
