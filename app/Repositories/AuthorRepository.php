<?php

namespace App\Repositories;

use App\Models\Author;
use InfyOm\Generator\Common\BaseRepository;

class AuthorRepository extends BaseRepository
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
        return Author::class;
    }
}
