<?php

namespace models;

use app\MainModel;

class Utilisateur extends MainModel
{
    protected string $tableName = 'utilisateur';
    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
    }

}