<?php

namespace models;

use app\MainModel;

class Contact extends MainModel{
    protected string $tableName = 'contact';
    public function __construct(array $attributes = []){
        parent::__construct($attributes);
    }
}