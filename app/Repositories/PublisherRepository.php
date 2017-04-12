<?php

namespace App\Repositories;

use App\Models\Publisher;
use InfyOm\Generator\Common\BaseRepository;

class PublisherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Publisher::class;
    }
}
