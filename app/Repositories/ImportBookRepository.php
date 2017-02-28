<?php

namespace App\Repositories;

use App\Models\ImportBook;
use InfyOm\Generator\Common\BaseRepository;

class ImportBookRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'book_id',
        'amount',
        'date',
        'buy_price',
        'sell_price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ImportBook::class;
    }
}
