<?php


namespace Quiz\Repositories;


use Illuminate\Database\Eloquent\Model;
use Quiz\Models\AttemptModel;

/**
 * Class AttemptRepository
 * @method AttemptModel create(array $data) : Model
 * @method AttemptModel one(array $conditions =[]) : ?Model
 */
class AttemptRepository extends BaseRepository
{
    public function getModelClass()
    {
        return AttemptModel::class;
    }

}