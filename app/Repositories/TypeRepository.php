<?php

namespace App\Repositories;

use App\Models\Type;
use InfyOm\Generator\Common\BaseRepository;

class TypeRepository extends BaseRepository
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
        return Type::class;
    }
}
