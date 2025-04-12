<?php

namespace controllers;

use app\MainController;
use models\Voiture; // Import the 'models\Voiture' class
use app\Paginator;
use models\Marque;
use models\Image;

class VoitureController extends MainController
{
    private Voiture $voitureModel;
    private Marque $marqueModel;
    private Image $imageModel;

    /**
     * Constructor for initializing model "Voiture".
     */
    public function __construct()
    {
        // Ensure loadModel returns an instance of models\Voiture
        $this->voitureModel = $this->loadModel("voiture");
        $this->marqueModel = new Marque();
        $this->imageModel = new Image();
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
        $base_url = empty($marque) ? "/supercar/voiture" : "/supercar/voiture?marque=$marque";
        
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

    public function getByColumn(array $params): void {
        $column_name = key($params);
        $value = $params[$column_name];
        $car = $this->voitureModel->getByColumn([$column_name => $value]);
        $brand = $this->marqueModel->getByColumn(["id_marque" => $car["id_marque"]]) ?? "";
        $images = $this->imageModel->getCarImages($car["id_voiture"]);
        //var_dump($car);
        //var_dump($brand);
        //var_dump($images);
        $this->render(
            "voiture-details", "",
            [
                "car" => $car,
                "brand" => $brand,
                "images" => $images
            ]
        );
    }
}
