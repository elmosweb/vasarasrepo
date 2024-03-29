<?php


namespace Quiz\Tests;


use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use Quiz\Exceptions\QuizException;
use Quiz\Models\AttemptModel;
use Quiz\Models\QuizModel;
use Quiz\Repositories\QuestionRepository;
use Quiz\Repositories\QuizRepository;
use Quiz\Repositories\UserAnswerRepository;
use Quiz\Repositories\AttemptRepository;
use Quiz\Repositories\UserRepository;
use Quiz\Repositories\AnswerRepository;
use Quiz\Services\QuizService;
use Quiz\Session;
use Mockery;
class QuizServicesTest extends TestCase
{
    /** @var QuizRepository | MockInterface $quizRepository */
    private $quizRepository;
    /** @var UserRepository | MockInterface $userRepository */
    private $userRepository;
    /** @var Session | MockInterface $session */
    private $session;
    /** @var QuestionRepository | MockInterface $questionRepository */
    private $questionRepository;
    /** @var AnswerRepository | MockInterface $answerRepository */
    private $answerRepository;
    /** @var UserAnswerRepository | MockInterface $userAnswerRepository */
    private $userAnswerRepository;
    /** @var AttemptRepository | MockInterface $attemptRepository */
    private $attemptRepository;
    public function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
        Mockery::close();
    }

    public function setUp(): void

    {
        parent::setUp();
        $this->quizRepository= Mockery::mock(QuizRepository::class);
        $this->userRepository= Mockery::mock(UserRepository::class);
        $this->session= Mockery::mock(Session::class);
        $this->questionRepository= Mockery::mock(QuestionRepository::class);
        $this->answerRepository= Mockery::mock(AnswerRepository::class);
        $this->userAnswerRepository= Mockery::mock(UserAnswerRepository::class);
        $this->attemptRepository= Mockery::mock(AttemptRepository::class);


        $this->quizService = new QuizService(
        $this->quizRepository,
        $this->userRepository,
        $this->questionRepository,
        $this->answerRepository,
        $this->userAnswerRepository,
        $this->attemptRepository,
            $this->session
    );


    }


    public function testQuizStart()
    {
        $this->userRepository->shouldReceive('userExists')
            ->atLeast()
            ->once()
            ->andReturnFalse();
        $this->expectException(QuizException::class);
        $this->quizService->start(1, 1);
    }
    public function testQuizStart_userDoesntExist_exceptionThrown()
    {
        $this->userRepository
            ->shouldReceive('userExists')
            ->once()
            ->andReturnTrue();
        $returnedQuiz = new QuizModel;
        $returnedQuiz->id = 500;
        $this->quizRepository->shouldReceive('one')
            ->atLeast()
            ->once()
            ->andReturnNull();
        $this->expectException(QuizException::class);
        $this->quizService->start(1, 1);

    }

    public function testQuizStart_everythingisCorrect_quizReturned(){
        $this->userRepository
            ->shouldReceive('userExists')
            ->once()
            ->andReturnTrue();

        $returnedQuiz = new QuizModel;
        $returnedQuiz->id = 1000;

        $this->quizRepository->shouldReceive('one')
            ->atLeast()
            ->once()
            ->andReturn($returnedQuiz);

        $userId = 30;
        $quizId = 15;

        $returnedAttempt = new AttemptModel;
        $returnedAttempt->id = 1000;

        $this->attemptRepository->shouldReceive('create')
            ->atLeast()
            ->once()
            ->with([
                'user_id'=>$userId,
                'quiz_id'=>$quizId
    ])->once()
            ->andReturn($returnedAttempt);
        $this->session->shouldReceive('set')->atLeast()->twice();
        $quiz = $this->quizService->start($userId, $quizId);
        $this->assertEquals($returnedQuiz->id, $quiz->id, 'Correct quiz returned');
    }

}