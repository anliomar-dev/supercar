<?php

namespace app;

class Authorization extends MainController
{

    public function index(): void{
        $this->render('forbidden', "", [], "Authorization");
    }

    /**
     * check if the user has is_admin permission and let him access admin interface, otherwide, redirect to permissins denied page
     * @return void
     */
    public function is_staff(): void{
        $is_admin = $_SESSION['is_admin'];
        $is_superuser = $_SESSION['is_super_user'];
        if($is_admin == 0 && $is_superuser == 0){
            header('location: /supercar/authorization');
            exit();
        }
    }
}