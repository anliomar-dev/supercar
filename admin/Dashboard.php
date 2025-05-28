<?php

    namespace admin;

    use app\Authentication;
    use app\MainController;
    use app\Authorization;

    class Dashboard extends MainController
    {

        public function index(): void {
            $auth = new Authentication();
            $auth->is_authenticated("admin", 300);
            $authorization = new Authorization();
            $authorization->is_staff();
            $this->render('dashboard', 'admin');
        }
    }