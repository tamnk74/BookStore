<?php

namespace App\Repositories;

use App\Models\Publish;
use InfyOm\Generator\Common\BaseRepository;

class PublishRepository extends BaseRepository
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
        return Publish::class;
    }
}
