<?php


namespace Quiz\Services;



use Quiz\Exceptions\QuizException;
use Quiz\Models\AnswerModel;
use Quiz\Models\QuestionModel;
use Quiz\Models\QuizModel;
use Quiz\Repositories\QuestionRepository;
use Quiz\Repositories\QuizRepository;
use Quiz\Repositories\UserAnswerRepository;
use Quiz\Repositories\AttemptRepository;
use Quiz\Repositories\UserRepository;
use Quiz\Repositories\AnswerRepository;
use Quiz\Session;

class QuizService
{

    private const SESSION_KEY_CURRENT_ATTEMPT_ID = 'currentAttemptId';
    const SESSION_KEY_QUESTIONS_ANSWERED = 'questionsAnswered';
    /** @var Class QuizRepository $repository */
    private $repository;
    private $userRepository;
    /** @var $session */
    private $session;
    /** @var QuestionRepository $questionRepository */
    private $questionRepository;
    private $answerRepository;
    private $userAnswerRepository;
    private $attemptRepository;

    public function __construct(
        QuizRepository $repository = null,
        UserRepository $userRepository = null,
        QuestionRepository $questionRepository = null,
        AnswerRepository $answerRepository = null,
        UserAnswerRepository $userAnswerRepository = null,
        AttemptRepository $attemptRepository = null,
        Session $session = null
    ) {
        $this->repository = $repository ?: new QuizRepository;
        $this->questionRepository = $questionRepository ?: new QuestionRepository;
        $this->userRepository = $userRepository ?: new UserRepository;
        $this->answerRepository = $answerRepository ?: new AnswerRepository;
        $this->userAnswerRepository = $userAnswerRepository ?: new UserAnswerRepository;
        $this->attemptRepository = $attemptRepository ?: new AttemptRepository;
        $this->session = $session ?: Session::getInstance();
    }

    public function getQuizRpcData()
    {
        $quizzes = $this->repository->all();
        $quizData = [];
        foreach ($quizzes as $quiz) {
            $questionCount = $this->questionRepository->count(['quiz_id'=>$quiz->id]);
            $quizData[] = [
                'id' => $quiz->id,
                'title' => $quiz->title,
                'questionCount' => $questionCount,
            ];
        }
        return $quizData;
    }
    public function getAttemptRpcData()
    {
        $attempts = $this->attemptRepository->all();
        $attemptData = [];
        foreach ($attempts as $attempt) {
            $attemptData[] = [
                'user_id'=>$attempt->user_id,
                'quiz_id' => $attempt->quiz_id,
            ];
        }
        return $attemptData;
    }




    /**
     * @param int $userId
     * @param int $quizId
     * @return \Illuminate\Database\Eloquent\Model/QuizModel
     * @throws \Exception
     */
    public function start(int $userId, int $quizId)
    {
        $userExists = $this->userRepository->userExists(['id' => $userId]);
        if (!$userExists) {
            throw new QuizException('Unknown user');
        }
        $quiz = $this->GetQuizById($quizId);
        $attempt = $this->attemptRepository->create([
            'user_id' => $userId,
            'quiz_id' => $quizId
        ]);

        $this->session->set(self::SESSION_KEY_CURRENT_ATTEMPT_ID, $attempt->id);
        $this->session->set(self::SESSION_KEY_QUESTIONS_ANSWERED, 0);

        return $quiz;


    }

    public function getNextQuestion()
    {
        $attemptId = $this->session->get(self::SESSION_KEY_CURRENT_ATTEMPT_ID);

        $attempt = $this->getAttemptById($attemptId);
        $questionsAnswered = $this->session->get(self::SESSION_KEY_QUESTIONS_ANSWERED);
        if ($questionsAnswered === -1) {
            throw new QuizException('Questions answered not set');
        }
        $question = $this->questionRepository->getQuestionByQuizIdAndOffset($attempt->quiz_id, $questionsAnswered);
        return $question;
    }

    public function getQuestionRpcData(QuestionModel $question)
    {
        $answerData = [];
        foreach ($question->answers as $answer) {
            $answerData[] = $this->getAnswerRpcData($answer);
        }
        return [
            'id' => $question->id,
            'text' => $question->text,
            'answers' => $answerData
        ];
    }

    public function getAnswerRpcData(AnswerModel $answer)
    {
        return [
            'id' => $answer->id,
            'text' => $answer->text
        ];
    }

    /**
     * @param int $quizId
     * @return QuizModel|null
     * @throws \Exception
     */
    public function GetQuizById(int $quizId)
    {
        $quiz = $this->repository->one(['id' => $quizId]);
        if (!$quiz) {
            throw new QuizException("Could not find #$quizId");
        }
        return $quiz;
    }

    public function saveAnswer($answerId)
    {
        $answer = $this->answerRepository->one(['id' => $answerId]);
        if (!$answer) {
            throw new QuizException("could not find answer with id $answerId");
        }
        $currentAttemptId = $this->session->get(self::SESSION_KEY_CURRENT_ATTEMPT_ID);
        $attempt = $this->getAttemptById($currentAttemptId);
        $this->userAnswerRepository->create([
            'attempt_id' => $attempt->id,
            'question_id' => $answer->question_id,
            'answer_id' => $answer->id,
        ]);
        $questionsAnswered = $this->session->get(self::SESSION_KEY_QUESTIONS_ANSWERED);
        $questionsAnswered++;
        $this->session->set(self::SESSION_KEY_QUESTIONS_ANSWERED, $questionsAnswered);

    }

    public function getResultData()
    {
        $currentAttemptId = $this->session->get(self::SESSION_KEY_CURRENT_ATTEMPT_ID);
        $attempt = $this->getAttemptById($currentAttemptId);
        $correctAnswerCount = 0;
        foreach ($attempt->userAnswers as $userAnswer){
            $correctAnswerCount +=$userAnswer->answer->is_correct;
        }
        $this->session->delete(self::SESSION_KEY_CURRENT_ATTEMPT_ID);
        $this->session->delete(self::SESSION_KEY_QUESTIONS_ANSWERED);

        return [
            'correctAnswerCount' => $correctAnswerCount,
        ];
    }

    /**
     * @param $attemptId
     * @return \Quiz\Models\AttemptModel
     * @throws \Exception
     */
    public function getAttemptById($attemptId): \Quiz\Models\AttemptModel
    {
        $attempt = $this->attemptRepository->one(['id' => $attemptId]);
        if (!$attempt) {
            throw new QuizException('Quiz has not been started');
        }
        return $attempt;
    }


}