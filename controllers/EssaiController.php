<?php

namespace controllers;

use app\MainController;

class EssaiController extends MainController
{
    public function index(): void{
        $this->render('essai');
    }
}