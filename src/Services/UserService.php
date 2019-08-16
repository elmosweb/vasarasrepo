<?php


namespace Quiz\Services;

use Exception;
use Quiz\Models\UserModel;
use Quiz\Repositories\UserRepository;
use Quiz\Session;

class UserService
{
    private $repository;
    public function __construct(?UserRepository $repository = null)
    {
        $this->repository = $repository ?? new UserRepository();
    }

    /**
     * @param array $data
     * @return UserModel
     * @throws Exception
     */
    public function registerUser(array $data =[]) : UserModel
    {
        if($this->repository->userExists(['email' =>$data['email']])){
            throw new Exception('User already registrered');
        }
        if (count(array_filter($data)) != count($data)) {
            throw new Exception('You must fill out all fields!');
        }

    return $this->repository->create($data);

    }
    public function attemptLogin(array $data){
        $user = $this->repository->one(['email' =>$data['email']]);
        $doesUserExist = (bool)$user;
        $password_verify = password_verify($data['password'], $user->password ?? '');

        if(!$doesUserExist || !$password_verify){
            throw new Exception ('Email or Password is incorrect!');
        }
        $this->login($user);
    }
    protected function login(UserModel $user)
    {
        Session::getInstance()->setLoggedInUser($user);
    }
}