<?php

    namespace admin;
    use app\MainController;
    use app\Paginator;
    use models\Contact;

    class Contacts extends MainController
    {
        private Contact $contactModel;

        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Evennement
            $this->contactModel = $this->loadModel("Contact");

        }
        public function index(): void {
            $contact = $_GET["contact"] ?? "";
            if($contact == ""){
                $query = "
                    SELECT * FROM contact
                ";
            }else{
                $query = "SELECT * FROM contact WHERE id_contact = $contact";
            }
            $current_page = $_GET['page'] ?? 1;
            $per_page = 6;
            $paginator = new Paginator($this->contactModel->getConnection(), $query, $per_page, $current_page);
            $paginated_contacts = $paginator->getPaginationData();
            $base_url = "/supercar/admin/contactes";

            $total_pages = $paginated_contacts["total_page"];
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

            if ($contact == ""){
                $this->render(
                    "contacts", "admin",
                    [
                        "paginated_contacts" => $paginated_contacts,
                        "prev_url" => $prev_url,
                        "next_url" => $next_url,
                    ]
                );
            }else{
                $this->render(
                    "contacts", "admin",
                    [
                        "current_contact" => $paginated_contacts["data"][0],
                    ]
                );
            }
        }
    }