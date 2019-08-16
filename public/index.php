<?php

use Illuminate\Support\Arr;
use Quiz\Models\QuizModel;
use Quiz\Models\QuestionModel;
use Quiz\Models\AnswerModel;
use Quiz\Route;
use Quiz\Controllers\NotFoundController;


require_once __DIR__ . '/../vendor/autoload.php';
require_once  '../src/bootstrap.php';

/**
 * @var Route[] $routes;
 */
$routes = require_once '../src/routes.php';


/*//var_dump($routes);
//
//$quiz = QuizModel::query()->where(['id' =>1])->first();
//
//echo $quiz->title . '<br>';
//foreach ($quiz->questions as $question){
//    echo $question->text . '<br>';*/

$parsed = parse_url($_SERVER['REQUEST_URI']);
$path = $parsed['path'];
/** @var Route  $route */
$route = Arr::get($routes, $path, new Route(NotFoundController::class));
/**
 * pec tam vinsh izpilda un beidz
 */
    $route->handle();


?>
<?php
/*
$dsn = 'mysql:host=127.0.0.1;charset=utf8;dbname=quizzes';
$connection = new PDO($dsn, 'homestead', 'secret');
$quizId = $_GET['quizId'] ?? null;
$query = "SELECT * FROM quizzes";
$statement = $connection->prepare($query);
$statement->execute();

$quizData = $statement->fetchAll(PDO::FETCH_ASSOC);
$quizzes =[];

foreach (($quizData as $quizDatum))

$quizData = $quizData[0];
$quiz = QuizModel::fromArray($quizData);
var_dump($quiz);
*/
?>
