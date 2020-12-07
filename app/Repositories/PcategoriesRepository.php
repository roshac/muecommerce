<?php

namespace App\Repositories;

use App\Models\Pcategories;
use App\Repositories\BaseRepository;

/**
 * Class PcategoriesRepository
 * @package App\Repositories
 * @version March 25, 2020, 12:25 pm UTC
*/

class PcategoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pcategories::class;
    }
}
