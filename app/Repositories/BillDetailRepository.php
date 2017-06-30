<?php

namespace App\Repositories;

use App\Models\BillDetail;
use InfyOm\Generator\Common\BaseRepository;

class BillDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'book_id',
        'amount',
        'bill_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BillDetail::class;
    }

}
