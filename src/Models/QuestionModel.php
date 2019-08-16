<?php
namespace Quiz\Models;

use Illuminate\Database\Eloquent\Model;


class QuestionModel extends BaseModel
{

    public $table = 'questions';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quiz(){
        return $this->hasOne(QuizModel::class, 'id', 'quiz_id');
    }

    public function answers(){
        return $this->hasMany(AnswerModel::class, 'question_id', 'id');
    }
    public function userAnswers(){
        return $this->hasMany(UserAnswerModel::class, 'question_id', 'id');
    }
}