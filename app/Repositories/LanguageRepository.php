<?php

namespace App\Repositories;

use App\Models\Language;
use InfyOm\Generator\Common\BaseRepository;

class LanguageRepository extends BaseRepository
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
        return Language::class;
    }
}
