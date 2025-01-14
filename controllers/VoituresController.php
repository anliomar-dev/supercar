<?php

namespace controllers;

use app\MainController;

class VoituresController extends MainController
{
    function index(): void{
        $this->render("voitures");
    }
}