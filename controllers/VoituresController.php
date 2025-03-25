<?php

namespace controllers;

use app\MainController;
use models\Voiture; // Import the 'models\Voiture' class
use app\Paginator;
use models\Marque;

class VoituresController extends MainController
{
    private Voiture $voitureModel;
    private Marque $marqueModel; 

    /**
     * Constructor for initializing model "Voiture".
     */
    public function __construct()
    {
        // Ensure loadModel returns an instance of models\Voiture
        $this->voitureModel = $this->loadModel("Voiture");
        $this->marqueModel = new Marque();
    }

    /**
     * @return void
     */
    public function index(): void{
        $marque = $_GET["marque"] ?? "";
        $query_cars = $this->voitureModel->all($marque);
        $current_page = $_GET['page'] ?? 1;
        $per_page = 5;
        $paginator = new Paginator($this->voitureModel->getConnection(), $query_cars, $per_page, $current_page);
        $paginated_cars = $paginator->getPaginationData();
        $base_url = empty($marque) ? "/supercar/voitures" : "/supercar/voitures?marque=$marque";
        
        $total_pages = $paginated_cars["total_page"];
        $next_url = null;
        $prev_url = null;

        if($total_pages > 1 && $current_page < $total_pages){
            $next_page = $current_page + 1;
            $next_url = empty($marque) ? $base_url . "?page=$next_page" : 
            $base_url . "&page=$next_page";
        }

        if($total_pages > 1 && $current_page > 1){
            $prev_page = $current_page - 1;
            $prev_url = empty($marque) ? $base_url . "?page=$prev_page" : 
            $base_url . "&page=$prev_page";
        }

        $all_brands = $this->marqueModel->getAllBrands();
        /***$data = [
            "paginated_cars" => $paginated_cars, 
            "all_brands" => $all_brands,
            "prev_url" => $prev_url,
            "next_url" => $next_url
        ];
        var_dump($data);*/

        $this->render(
            "voitures", "", 
            [
                "paginated_cars" => $paginated_cars, 
                "all_brands" => $all_brands,
                "prev_url" => $prev_url,
                "next_url" => $next_url
            ]
        );
    }

}
