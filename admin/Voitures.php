<?php

    namespace admin;

    use app\MainController;
    use app\Paginator;
    use models\Marque;
    use models\Voiture;

    class Voitures extends MainController
    {
        private Voiture $voitureModele;
        private Marque $marqueModel;

        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Voiture
            $this->voitureModele = new Voiture();
            $this->marqueModel = new Marque();

        }
        public function index(): void {
            $slug = $_GET["slug"] ?? "";
            if($slug == ""){
                $query = "
                    SELECT marque.nom AS nom_marque, marque.logo AS marque_logo, 
                           voiture.id_voiture AS id_voiture, voiture.nom AS modele, 
                           voiture.prix AS prix, voiture.slug AS modele_slug
                    FROM voiture
                    JOIN marque ON marque.id_marque = voiture.id_marque
                ";
            }else{
                $query = "SELECT * FROM voiture WHERE slug = '$slug'";
            }
            $current_page = $_GET['page'] ?? 1;
            $per_page = 6;
            $paginator = new Paginator($this->voitureModele->getConnection(), $query, $per_page, $current_page);
            $paginated_cars = $paginator->getPaginationData();
            $base_url = "/supercar/admin/voitures";

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

            if ($slug == ""){
                $this->render(
                    "voitures", "admin",
                    [
                        "all_brands" => $all_brands,
                        "paginated_cars" => $paginated_cars,
                        "prev_url" => $prev_url,
                        "next_url" => $next_url
                    ]
                );
            }else{
                $this->render(
                    "voitures", "admin",
                    [
                        "all_brands" => $all_brands,
                        "current_car" => $paginated_cars["data"][0],
                    ]
                );
            }
        }
    }