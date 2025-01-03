<?php

namespace app;

use app\MainController;
use models\Utilisateur;

class Authentication extends MainController
{
    private Utilisateur $utilisateurModel;

    public function __construct(){
        $this->utilisateurModel = $this->loadModel("Utilisateur");
    }
}
