<?php

    namespace controllers;
    use app\MainController;
    use models\Voiture; // Import the 'models\Voiture' class

    class ApicarsController extends MainController
    {
        private Voiture $voitureModele;

        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Voiture
            $this->voitureModele = $this->loadModel("voiture");
        }
        public function index(): void{
            header('Content-Type: application/json; charset=utf-8');
            $brand = $_GET["brand"] ?? "";

            if(!intval($brand)){
                http_response_code(400);
                echo json_encode(["details" => "the value of marque must be a integer"]);
            }else{
                http_response_code(200);
                $filtered_cars = $this->voitureModele->allCarsByBrand($brand);
                echo json_encode($filtered_cars);
            }
        }
    }
