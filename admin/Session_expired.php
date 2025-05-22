<?php

    namespace admin;

    use app\MainController;

    class Session_expired extends MainController {
        public function index():void {
            $this->render('session_expired', 'admin');
        }
    }