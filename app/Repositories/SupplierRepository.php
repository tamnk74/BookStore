<?php

namespace App\Repositories;

use App\Models\Supplier;
use InfyOm\Generator\Common\BaseRepository;

class SupplierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'phone_number'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Supplier::class;
    }
}
