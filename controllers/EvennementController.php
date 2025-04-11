<?php

namespace controllers;

use app\MainController;
use models\Evennement;

class EvennementController extends MainController
{
    private Evennement $evennementModel;

    /**
     * Constructor for initializing model "Evennement".
     */
    public function __construct()
    {
        $this->evennementModel = $this->loadModel("evennement");
    }

    public function index():void{
        $events = $this->evennementModel->all();
        $this->render("evennement", "", ["events"=>$events]);
    }

}