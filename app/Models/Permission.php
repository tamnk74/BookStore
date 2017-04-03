<?php

namespace App\Models;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $table = "permission";

    protected $fillable = [
        'name', 'display_name', 'description'
    ];
}