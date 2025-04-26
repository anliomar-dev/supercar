<?php

    namespace admin;
    use app\MainController;
    use app\Paginator;
    use models\Evennement;

    class Evennements extends MainController
    {
        private Evennement $eventModel;

        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Evennement
            $this->eventModel = $this->loadModel("Evennement");

        }
        public function index(): void {
            $event = $_GET["event"] ?? "";
            if($event == ""){
                $query = "
                    SELECT evennement.id_evennement, evennement.titre, evennement.date_debut, evennement.date_fin, evennement.image, evennement.location
                    FROM evennement ORDER BY date_debut, date_fin
                ";
            }else{
                $query = "SELECT * FROM evennement WHERE id_evennement = 'event'";
            }
            $current_page = $_GET['page'] ?? 1;
            $per_page = 6;
            $paginator = new Paginator($this->eventModel->getConnection(), $query, $per_page, $current_page);
            $paginated_events = $paginator->getPaginationData();
            $base_url = "/supercar/admin/voitures";

            $total_pages = $paginated_events["total_page"];
            $next_url = null;
            $prev_url = null;

            if($total_pages > 1 && $current_page < $total_pages){
                $next_page = $current_page + 1;
                $next_url = empty($event) ? $base_url . "?page=$next_page" :
                    $base_url . "&page=$next_page";
            }

            if($total_pages > 1 && $current_page > 1){
                $prev_page = $current_page - 1;
                $prev_url = empty($event) ? $base_url . "?page=$prev_page" :
                    $base_url . "&page=$prev_page";
            }

            if ($event == ""){
                $this->render(
                    "evennements", "admin",
                    [
                        "paginated_events" => $paginated_events,
                        "prev_url" => $prev_url,
                        "next_url" => $next_url,
                    ]
                );
            }else{
                $this->render(
                    "evennements", "admin",
                    [
                        "current_event" => $paginated_events["data"][0],
                    ]
                );
            }
        }
    }