<?php


namespace Quiz\Controllers;
use Quiz\ActiveUser;
use Quiz\Models\AttemptModel;
use Quiz\Models\QuizModel;
use Quiz\Models\UserModel;
use Quiz\Services\QuizService;

class IndexController extends BaseController
{
    /** @var QuizService $quizService */
    private $quizService;
    public function __construct()
    {
        $this->quizService = new QuizService();
        parent::__construct();
    }
    public function index()
    {
        if(!ActiveUser::isLoggedIn()){
            redirect('/login');
        }
        try{
            $quizData = $this->quizService->getQuizRpcData();

        }catch (\Exception $exception){
            die($exception->getMessage());
        }
        if(ActiveUser::isLoggedIn()) {
            $quizzes = QuizModel::all();
        }
    return $this->view('Home', ['quizData'=>$quizData]);

    }
    public function about(){
        return $this->view('about');
    }
    public function attempts()
    {
        if(!ActiveUser::isLoggedIn()){
            redirect('/login');
        }
        try{
            $attemptData = $this->quizService->getAttemptRpcData();

        }catch (\Exception $exception){
            die($exception->getMessage());
        }
        if(ActiveUser::isLoggedIn()) {
            $attempts = AttemptModel::all();
        }
        return $this->view('/quizzes', ['attemptData'=>$attemptData]);

    }
}