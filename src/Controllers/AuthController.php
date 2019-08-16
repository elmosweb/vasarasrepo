<?php


namespace Quiz\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Capsule;
use Quiz\Services\UserService;
use Quiz\Session;
use Exception;


class AuthController extends BaseController
{
    public function register()
    {
/* Execute view funkciju no basecontroller, kas talak rendero skatu no view*/
        return $this->view('register');

    }

    public function registerPost()
    {
/*Panem datus*/
        $data = $this->input;
        if ($data['password'] !== $data['password_confirmation']) {
            $passwordMatchError = 'Passwords do not match';
            Session::getInstance()->addError($passwordMatchError);
            redirect('register');
            die;

        }
        if(strlen($data['password']) < 8){
            $passwordLengthError = 'Password must be at least 8 characters long!';
            Session::getInstance()->addError($passwordLengthError);
        redirect('register');
        die;
        }
        /*Izveido jaunu uzserservice*/
        $userService = new UserService();

        try {
            $userService->registerUser($data);
        } catch (Exception $exception) {
            Session::getInstance()->addError($exception->getMessage());
            redirect('register');
            die;
        }
        Session::getInstance()->addMessage('You have succesfully registred. You can log-in now');
        redirect('login');

    }

    public function login()
    {
        return $this->view('login');

    }
    public function logout()
    {
        Session::getInstance()->delete(Session::LOGGED_IN_USER);
        redirect('/');

    }


    public function loginPost(){
        $data = $this->input;
        $userService = new UserService();
        try{
            $userService->attemptLogin($data);
            redirect('/');

        }catch(Exception $exception){
            Session::getInstance()->addError($exception->getMessage());
            redirect('login');
        }
    }
}