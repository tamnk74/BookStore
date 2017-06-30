<?php

namespace App\Repositories;

use App\Models\Promotion;
use InfyOm\Generator\Common\BaseRepository;

class PromotionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'book_id',
        'level'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Promotion::class;
    }
}
