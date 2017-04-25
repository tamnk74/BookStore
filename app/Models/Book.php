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
        'publisher_id',
        'issuer_id',
        'price',
        'sale',
        'description',
        'size',
        'weight',
        'page',
        'front_cover',
        'back_cover',
        'language_id',
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
        'publisher_id' => 'integer',
        'price' => 'integer',
        'sale' => 'integer',
        'description' => 'string',
        'size' => 'string',
        'weight' => 'float',
        'page' => 'integer',
        'front_cover' => 'string',
        'back_cover' => 'string',
        'language_id' => 'integer',
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
        'publisher_id' => 'required',
        'price' => 'required|integer',
        'weight' => 'numeric',
        'sale' => 'integer|min:0|max:100',
        'size' => 'regex:/^[0-9]+(.[0-9]{1,2}){0,1}x[0-9]+(.[0-9]{1,2}){0,1}$/',
        'front_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'back_cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required',
        'type_id' => 'required',
        'publishing_year' => 'required'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function issuer()
    {
        return $this->belongsTo(Issuer::class, 'issuer_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
