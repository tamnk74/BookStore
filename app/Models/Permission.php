<?php

namespace App\Models;
use Zizaco\Entrust\EntrustPermission;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends EntrustPermission
{
    protected $table = "permission";

    protected $fillable = [
        'name', 'display_name', 'description'
    ];
}