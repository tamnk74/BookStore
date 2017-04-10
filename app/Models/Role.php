<?php

namespace App\Models;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends EntrustRole
{
    use SoftDeletes;

    protected $table = "role";

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];
}