<?php

namespace App\Models;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends EntrustRole
{
    protected $table = "role";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
}