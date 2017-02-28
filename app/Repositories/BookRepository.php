<?php

namespace App\Repositories;

use App\Models\Book;
use InfyOm\Generator\Common\BaseRepository;

class BookRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'author_id',
        'publish_id',
        'price',
        'image',
        'category_id',
        'type_id',
        'publishing_year'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Book::class;
    }
}
