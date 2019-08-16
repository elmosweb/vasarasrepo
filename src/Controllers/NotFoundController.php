<?php


namespace Quiz\Controllers;


class NotFoundController extends BaseController
{
    public function index()
    {
        return $this->view('notfound');
    }
}