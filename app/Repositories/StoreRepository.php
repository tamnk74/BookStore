<?php

namespace App\Repositories;

use App\Models\Store;
use InfyOm\Generator\Common\BaseRepository;

class StoreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'book_id',
        'current_ammount',
        'amount'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Store::class;
    }
}
