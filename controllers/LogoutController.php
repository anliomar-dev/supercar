<?php
namespace controllers;
use app\Authentication;

class LogoutController
{
    public function index():void{
        ob_start();
        $auth = new Authentication();
        $auth->logout();
        ob_end_flush();
    }
}