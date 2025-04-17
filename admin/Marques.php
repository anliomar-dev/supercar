<?php

    namespace admin;

    use app\MainController;
    use app\Paginator;
    use models\Marque;

    class Marques extends MainController
    {
        private Marque $marqueModele;


        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\marque
            $this->marqueModele = $this->loadModel("marque");

        }
        public function index(): void {
            $brand_slug = $_GET["brand"] ?? "";
            if($brand_slug == ""){
                $query = "SELECT * FROM marque";
            }else{
                $query = "SELECT * FROM marque WHERE slug = '$brand_slug'";
            }
            $current_page = $_GET['page'] ?? 1;
            $per_page = 6;
            $paginator = new Paginator($this->marqueModele->getConnection(), $query, $per_page, $current_page);
            $paginated_brands = $paginator->getPaginationData();
            $base_url = "/supercar/admin/marques";

            $total_pages = $paginated_brands["total_page"];
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

            if ($brand_slug == ""){
                $this->render(
                    "marques", "admin",
                    [
                        "paginated_brands" => $paginated_brands,
                        "prev_url" => $prev_url,
                        "next_url" => $next_url
                    ]
                );
            }else{
                $this->render(
                    "marques", "admin",
                    [
                        "current_brand" => $paginated_brands["data"][0],
                    ]
                );
            }
        }
    }