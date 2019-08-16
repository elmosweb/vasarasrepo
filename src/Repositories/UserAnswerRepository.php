<?php


namespace Quiz\Repositories;




use Quiz\Models\UserAnswerModel;

class UserAnswerRepository extends  BaseRepository
{
    public function getModelClass()
    {
        return UserAnswerModel::class;
    }

}