<?php


namespace Quiz\Repositories;


use Quiz\Models\QuestionModel;

class QuestionRepository extends BaseRepository
{
    public function getModelClass()
    {
        return QuestionModel::class;
    }

    /**
     * @param int $quizId
     * @param int $offset
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQuestionByQuizIdAndOffset(int $quizId, int$offset)
    {
        return QuestionModel::query()
            ->where(['quiz_id' => $quizId])
            ->offset($offset)
            ->first();
    }
}