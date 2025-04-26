<?php

    namespace models;

    use app\MainModel;

    class Essai extends MainModel
    {
        protected string $tableName = 'essai';
        public function __construct(array $attributes = []) {
            parent::__construct($attributes);
        }
    }