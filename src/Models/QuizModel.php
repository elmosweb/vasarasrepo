<?php
namespace Quiz\Models;

/**
 * @property int $id
 * @title string $title
 * @property  QuestionModel[] $questions
 * @property  AttemptModel[] $attempt
 */
class QuizModel extends BaseModel
{
    /**
     * @var string uz kuru tabulu tieksies
     */
    public $table = 'quizzes';
    public function questions(){
        return $this->hasMany(QuestionModel::class, 'quiz_id', 'id');
    }
    public function attempts(){
        return $this->hasMany(AttemptModel::class, 'quiz_id', 'id');
    }
}
