<?php

namespace App\Repositories;

use App\Models\Employee;
use InfyOm\Generator\Common\BaseRepository;

class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'full_name',
        'phone_number',
        'birthday',
        'address'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Employee::class;
    }
}
