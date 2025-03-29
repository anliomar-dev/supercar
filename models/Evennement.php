<?php

    namespace models;

    use app\MainModel;

    class Evennement extends MainModel
    {
        public function __construct()
        {
            parent::__construct();
            $this->tableName = "evennement";
        }

    }