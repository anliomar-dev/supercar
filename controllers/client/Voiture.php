<?php

namespace controllers\client;

use app\MainController;

class Voiture extends MainController
{
    function index(): void{
        echo "hello bienvenue sur la page voitures";
    }
}