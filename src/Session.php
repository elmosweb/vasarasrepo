<?php


namespace Quiz;


use http\Message;
use phpDocumentor\Reflection\Types\Self_;
use Quiz\Models\UserModel;

class Session
{
    //Bus visiem objektiem instance
    const ERROR = 'error';
    const MESSAGES = 'messages';
    const LOGGED_IN_USER = 'LoggedInUser';
    protected static $instance;

    public function __construct()
    {

        session_start();
    }


    public static function getInstance() : Session
    {
//        nebus this, jo static, this un self, jamacas rakstit funcjkijas,
        //kur maksimali maz returnu
        //Ja nav iestatits, tad atgriez jaunu sesiju,
            if(!self::$instance){
                self::$instance = new Session();
            }
            return self::$instance;
    }


    public function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public function addMessage($string, $type= self::MESSAGES){
        $messages = $this->get($type, []);
        $messages[] = $string;
        $this->set($type, $messages);
    }

    public function getMessages(string $type = self::MESSAGES, bool $flush = false): array{
        $messages = $_SESSION[$type] ?? [];
        if($flush){
            $_SESSION[$type] =[];
        }
        return $messages;
    }
    public function addError($string){
        $this->addMessage($string, self::ERROR);
    }

    /**
     * @return string[]
     */
    public function getErrors(bool $flush = false): array{
       return $this->getMessages(self::ERROR, $flush);
    }

    public function hasErrors(): bool{
        return (bool)$this->hasMessages(self::ERROR);
    }
    public function hasMessages($type): bool{
        return (bool)$this->getMessages($type);
    }

    public function setLoggedInUser(UserModel $user)
    {
        $this->set(self::LOGGED_IN_USER, $user->id);
    }

    public function getLoggedInUserId(): ?int
    {
        return $this->get(self::LOGGED_IN_USER);

    }
    public function delete($key){
        unset($_SESSION[$key]);
    }


}