<?php
use Quiz\Controllers\AuthController;
use Quiz\Controllers\IndexController;
use Quiz\Controllers\QuizController;
use Quiz\Route;

return array(
    '/' =>new Route(IndexController::class,'index'),
    '/quizzes' =>new Route(IndexController::class, 'attempts'),
    '/about' =>new Route(IndexController::class, 'about'),
    '/register' =>new Route(AuthController::class, 'register'),
    '/login' =>new Route(AuthController::class, 'login'),
    '/registerPost' =>new Route(AuthController::class, 'registerPost'),
    '/loginPost' =>new Route(AuthController::class, 'loginPost'),
    '/logout' =>new Route(AuthController::class, 'logout'),
    '/quiz/start' =>new Route(QuizController::class, 'start'),
    '/quiz/next-question' =>new Route(QuizController::class, 'nextQuestion'),
);