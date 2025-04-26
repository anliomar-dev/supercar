<?php

    namespace admin;
    use app\MainController;
    use app\Paginator;
    use models\Image;

    class Images extends MainController
    {
        private Image $imageModele;

        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Evennement
            $this->imageModele = $this->loadModel("Image");

        }
        public function index(): void {
            $image = $_GET["image"] ?? "";
            if($image == ""){
                $query = "
                    SELECT image.*, modele.nom AS voiture FROM image JOIN modele on image.id_modele = modele.id_modele
                ";
            }else{
                $query = "SELECT * FROM image WHERE id_image = $image";
            }
            $current_page = $_GET['page'] ?? 1;
            $per_page = 6;
            $paginator = new Paginator($this->imageModele->getConnection(), $query, $per_page, $current_page);
            $paginated_images = $paginator->getPaginationData();
            $base_url = "/supercar/admin/images";

            $total_pages = $paginated_images["total_page"];
            $next_url = null;
            $prev_url = null;

            if($total_pages > 1 && $current_page < $total_pages){
                $next_page = $current_page + 1;
                $next_url = $base_url . "?page=$next_page";
            }

            if($total_pages > 1 && $current_page > 1){
                $prev_page = $current_page - 1;
                $prev_url = $base_url . "?page=$prev_page";
            }

            if ($image == ""){
                $this->render(
                    "images", "admin",
                    [
                        "paginated_images" => $paginated_images,
                        "prev_url" => $prev_url,
                        "next_url" => $next_url,
                    ]
                );
            }else{
                $this->render(
                    "images", "admin",
                    [
                        "current_image" => $paginated_images["data"][0],
                    ]
                );
            }
        }
    }