<?php

    namespace admin;

    use app\Authentication;
    use app\MainController;

    class Dashboard extends MainController
    {

        public function index(): void {
            $auth = new Authentication();
            $auth->is_authenticated("admin", 300);
            $this->render('dashboard', 'admin');
        }
    }