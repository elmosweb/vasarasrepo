<?php


namespace Quiz\Controllers;


use Illuminate\Support\Arr;
use Quiz\Models\QuizModel;
use Quiz\Repositories\QuizRepository;
use Quiz\Services\QuizService;
use Quiz\Session;


class QuizController extends BaseController
{
    private $quizService;
    public function __construct()
    {
        $this->quizService = new QuizService;
        parent::__construct();
    }
    public function start()
    {
        sleep(0.5);
        $userId = Session::getInstance()->getLoggedInUserId();
        $quizId = Arr::get($_POST, 'quizId');
        try{
            $this->quizService->start($userId, $quizId);
            $question = $this->quizService->getNextQuestion();
            $questionData = $this->quizService->getQuestionRpcData($question);
        }catch(\Exception $exception){
            return json_encode([
                'error'=>$exception->getMessage(),
            ]);
        }
        return json_encode(['questionData'=>$questionData]);

    }

    public function getresult()
    {
        sleep(0.5);
        $userId = Session::getInstance()->getLoggedInUserId();
        $quizId = Arr::get($_POST, 'quizId');
        try{
            $this->quizService->start($userId, $quizId);
            $question = $this->quizService->getNextQuestion();
            $questionData = $this->quizService->getQuestionRpcData($question);
        }catch(\Exception $exception){
            return json_encode([
                'error'=>$exception->getMessage(),
            ]);
        }
        return json_encode(['questionData'=>$questionData]);

    }


    public function nextQuestion()
    {
        $answerId = Arr::get($_POST, 'answerId');

        try{
            $this->quizService->saveAnswer($answerId);
            $question = $this->quizService->getNextQuestion();
            if(!$question){
                $resultData = $this->quizService->getResultData();
                return json_encode([
                    'resultData'=>$resultData,
                ]);
            }
            $questionData = $this->quizService->getQuestionRpcData($question);
        }catch(\Exception $exception){
            return json_encode([
                'error'=>$exception->getMessage(),
            ]);
        }
        return json_encode(['questionData'=>$questionData]);
    }

}