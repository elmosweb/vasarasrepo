<?php

namespace Quiz\Repositories;

use Quiz\Models\UserModel;
/**
 * @method UserModel|null one($conditions =[])
 * @method UserModel all($conditions =[])
 * @method USerModel create(array $data) : Model
 */
class UserRepository extends BaseRepository
{
    public function getModelClass()
    {
        return UserModel::class;
    }
    public function userExists(array $conditions =[]): bool
    {
        return UserModel::query()->where($conditions)->exists();
    }


}