<?php

namespace App\Repositories;

use App\Models\Category;
use App\Permission;
use InfyOm\Generator\Common\BaseRepository;

class PermissionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name', 'dislpay_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Permission::class;
    }
}
