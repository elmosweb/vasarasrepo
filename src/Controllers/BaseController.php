<?php


namespace Quiz\Controllers;
use Quiz\View;

abstract class BaseController
{

    protected $template = 'default';
    protected $input;
    protected function view(string $viewName, $params = [])
    {

        $view = $this->getView($viewName);
        return $view->render($params);
    }
    public function __construct()
    {
        $this->input = $_POST ?? [];
    }
    protected function getView($viewName): View {
        return new View($viewName, $this->template);
    }

}