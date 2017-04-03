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
        'sale',
        'front_cover',
        'back_cover',
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
        'sale' => 'integer',
        'front_cover' => 'string',
        'back_cover' => 'string',
        'back_covver' => 'integer',
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
        'price' => 'required',
        'sale' => 'required',
        'front_cover' => 'required',
        'back_cover' => 'required',
        'category_id' => 'required',
        'type_id' => 'required',
        'publishing_year' => 'required'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function publish()
    {
        return $this->belongsTo(Publish::class, 'publish_id');
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
