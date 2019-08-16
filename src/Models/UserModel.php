<?php
namespace Quiz\Models;


class UserModel extends BaseModel
{
    /**
     * @property $id
     * @property $name
     * @property $password
     * @property $email
     * @property AttemptModel[] $attempt;
     */
/**
 * one user has many user answrs public function UserAnswers
 */
    public $table = 'users';
    protected $fillable =['name', 'password', 'email'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function attempts(){
        return $this->hasMany(AttemptModel::class, 'user_id', 'id');
    }
    public function setPasswordAttribute($value){
        $this->attributes['password'] = password_hash($value, PASSWORD_DEFAULT);
    }

}