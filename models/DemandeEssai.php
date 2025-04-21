<?php

    namespace models;

    use app\MainModel;

    class DemandeEssai extends MainModel
    {
        public function __construct()
        {
            parent::__construct();
            $this->tableName = "demande_essai";
        }
    }