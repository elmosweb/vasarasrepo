<?php
namespace Quiz\Models;
use \Illuminate\Database\Eloquent\Relations\HasOne;
/**
 * Class UserAnswerModel
 * @property  int $id
 * @property  int $answer_id
 * @property  int $question_id
 * @property  int $attempt_id

 */

/**
 * Class UserAnswerModel
 * @property AnswerModel $answer
 * @property QuestionModel $question
 * @property AttemptModel $attempt
 */


class UserAnswerModel extends BaseModel
{
    public $table = 'user_answers';

    protected $guarded = [];

    /**
     * @return HasOne
     */



    /**
     * @return HasOne
     */
    public function answer() :HasOne {
        return $this->hasOne(AnswerModel::class, 'id', 'answer_id');
    }
    /**
     * @return HasOne
     */
    public function attempt(){
        return $this->hasOne(AttemptModel::class, 'id', 'attempt_id');
    }
    /**
     * @return HasOne
     */
    public function question(): HasOne{
        return $this->hasOne(QuestionModel::class, 'id', 'question_id');
    }

}