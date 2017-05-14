<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profile
 * @package App\Models
 * @version April 21, 2017, 3:10 am UTC
 */
class Profile extends Model
{
    use SoftDeletes;

    public $table = 'profiles';
    protected $primaryKey  = 'user_id';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'full_name',
        'phone_number',
        'birthday',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'full_name' => 'string',
        'phone_number' => 'string',
        'birthday' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|unique',
        'full_name' => 'min:0|max:100',
        'phone_number' => 'min:9|max:11',
        'birthday' => 'date|after:1960-01-01|before:2010-01-01',
        'address' => 'min:0|max:191',
    ];

    
}
