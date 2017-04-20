<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 * @package App\Models
 * @version April 19, 2017, 8:31 am UTC
 */
class Employee extends Model
{
    use SoftDeletes;

    protected $primaryKey  = 'user_id';
    public $table = 'employees';
    

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
        'full_name' => 'required|min:0|max:100',
        'phone_number' => 'required',
        'birthday' => 'required'
    ];

    
}
