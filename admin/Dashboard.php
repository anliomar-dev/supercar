<?php

    namespace admin;

    use app\MainController;

    class Dashboard extends MainController
    {
        public function index(): void {
            $this->render('dashboard', 'admin');
        }
    }