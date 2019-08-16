<?php


namespace Quiz\Repositories;


use Illuminate\Database\Eloquent\Model;
use Quiz\Models\AnswerModel;

/**
 * Class AnswerRepository
 * @method AnswerModel | null one(array $conditions = []) : ?Model
 */
class AnswerRepository extends BaseRepository
{
    public function getModelClass()
    {
        return AnswerModel::class;
    }

}