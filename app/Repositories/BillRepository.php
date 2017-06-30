<?php

namespace App\Repositories;

use App\Models\Bill;
use InfyOm\Generator\Common\BaseRepository;

class BillRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_name',
        'price_amount',
        'date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bill::class;
    }
}
