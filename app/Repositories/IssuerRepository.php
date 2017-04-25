<?php

namespace App\Repositories;

use App\Models\Issuer;
use InfyOm\Generator\Common\BaseRepository;

class IssuerRepository extends BaseRepository
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
        return Issuer::class;
    }
}
