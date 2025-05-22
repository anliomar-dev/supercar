<?php

    namespace admin;

    use app\MainController;
    use app\Authentication;

    class Logout extends MainController
    {
        public function index():void {
            $auth = new Authentication();
            $auth->destroySession();
            header("Location: /supercar/admin/login");
        }
    }