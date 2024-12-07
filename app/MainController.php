<?php

namespace app;

class MainController
{
    public function loadModel(string $modeleName){
        require_once(ROOT. '/model/'.$modeleName.'.php');
        $this->$modeleName = new $modeleName();
    }
}