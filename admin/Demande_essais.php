<?php

    namespace admin;

    use app\MainController;
    use app\Paginator;
    use models\Essai;
    use models\Marque;

    class Demande_essais extends MainController
    {
        private Essai $demandeEssaiModel;
        private Marque $marqueModel;


        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Utilisateur
            $this->demandeEssaiModel = $this->loadModel("Essai");
            $this->marqueModel = new Marque;

        }
        public function index(): void {
            // the id of the test drive (demande d'essai)
            $test_id = $_GET["essai"] ?? 0;
            if($test_id == 0){
                $query = "SELECT essai.id_demande_essai, essai.date_essai, 
                        essai.heure, essai.status, modele.nom AS voiture
                        FROM essai
                        JOIN modele ON modele.id_modele = essai.id_modele
                     ";
            }else{
                $query = "SELECT essai.*, modele.nom AS nom_modele FROM essai 
                           JOIN modele ON modele.id_modele = essai.id_modele
                           WHERE id_demande_essai = $test_id";
            }
            $current_page = $_GET['page'] ?? 1;
            $per_page = 6;
            // create an instance of the class paginator
            $paginator = new Paginator($this->demandeEssaiModel->getConnection(), $query, $per_page, $current_page);
            // paginate data
            $paginated_tests = $paginator->getPaginationData();
            $base_url = "/supercar/admin/demande_essais";

            $total_pages = $paginated_tests["total_page"];
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

            $all_brands = $this->marqueModel->getAllBrands();

            // If the parameter test_id is 0, it means it was not set in the URL, so we return all test drive requests (demandes d'essai).
            // Otherwise, we return the details of the test drive corresponding to the ID passed in the URL.
            if ($test_id == 0){
                $this->render(
                    "demande_essais", "admin",
                    [
                        "paginated_tests" => $paginated_tests,
                        "all_brands" => $all_brands,
                        "prev_url" => $prev_url,
                        "next_url" => $next_url
                    ]
                );
            }else{
                $this->render(
                    "demande_essais", "admin",
                    [
                        "all_brands" => $all_brands,
                        "current_test" => $paginated_tests["data"][0],
                    ]
                );
            }
        }
    }