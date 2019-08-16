<?php
namespace Quiz\Models;

/**
 * Class AnswerModel
 * @property int $id
 * @property string $title
 * @property bool $is_correct
 * @property int $question_id
 */

class AnswerModel extends BaseModel
{
    public $table = 'answers';
    public function questions(){
        return $this->hasOne(QuestionModel::class, 'id', 'question_id');
    }
    public function userAnswers(){
        return $this->belongsTo(UserAnswerModel::class, 'answer_id', 'id');
    }
}