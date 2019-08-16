<?php
namespace Quiz\Repositories;

use Quiz\Models\QuizModel;

/**
 * @method QuizModel|null one($conditions =[])
 * @method QuizModel all($conditions =[])
 * @method QuizModel create(array $data) : Model
 */
class QuizRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getModelClass()
    {
        return QuizModel::class;
    }
}