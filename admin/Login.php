<?php

    namespace admin;

    use app\MainController;

    class Login extends MainController
    {
        public function index(): void{
            $this->render("login", "admin");
        }
    }