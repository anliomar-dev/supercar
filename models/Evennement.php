<?php

    namespace models;

    use app\MainModel;

    class Evennement extends MainModel
    {
        protected string $tableName = 'evennement';
        public function __construct(array $attributes = []){
            parent::__construct($attributes);
        }
        public function all(): array{
            return $this->getAll('evennement');
        }
    }