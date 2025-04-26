<?php

    namespace admin;

    use app\MainController;
    use app\Paginator;
    use models\Utilisateur;

    class Utilisateurs extends MainController
    {
        private Utilisateur $utilisateurModele;


        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Utilisateur
            $this->utilisateurModele = $this->loadModel("Utilisateur");

        }
        public function index(): void {
            $user_id = $_GET["user"] ?? 0;
            if($user_id == 0){
                $query = "SELECT * FROM utilisateur";
            }else{
                $query = "SELECT * FROM utilisateur WHERE id_utilisateur = $user_id";
            }
            $current_page = $_GET['page'] ?? 1;
            $per_page = 6;
            $paginator = new Paginator($this->utilisateurModele->getConnection(), $query, $per_page, $current_page);
            $paginated_users = $paginator->getPaginationData();
            $base_url = "/supercar/admin/utilisateurs";

            $total_pages = $paginated_users["total_page"];
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

            if ($user_id == 0){
                $this->render(
                    "utilisateurs", "admin",
                    [
                        "paginated_users" => $paginated_users,
                        "prev_url" => $prev_url,
                        "next_url" => $next_url
                    ]
                );
            }else{
                $this->render(
                    "utilisateurs", "admin",
                    [
                        "current_user" => $paginated_users["data"][0],
                    ]
                );
            }
        }
    }