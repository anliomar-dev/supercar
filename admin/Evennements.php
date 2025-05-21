<?php

    namespace admin;
    use app\MainController;
    use app\Paginator;
    use models\Evennement;
    use PDOException;

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
                $query = "SELECT * FROM evennement WHERE id_evennement = $event";
            }
            $current_page = $_GET['page'] ?? 1;
            $per_page = 6;
            $paginator = new Paginator($this->eventModel->getConnection(), $query, $per_page, $current_page);
            $paginated_events = $paginator->getPaginationData();
            $base_url = "/supercar/admin/evennements";

            $total_pages = $paginated_events["total_page"];
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
                        "current_event" => $paginated_events["data"][0] ?? [],
                    ]
                );
            }
        }

        public function create(): void{
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $this->render("evennements", "admin",);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $title = $_POST["titre"] ?? "";
                $location = $_POST["location"] ?? "";
                $image_url = $_POST["event-img-url"] ?? "";
                $date_debut = $_POST["date_debut"] ?? "";
                $date_fin = $_POST["date_fin"] ?? "";
                $description = $_POST["description"] ?? "";

                 try{
                      // Data coming from the POST request
                      $new_event = $this->eventModel::create([
                          "titre" => $title,
                          "location" => $location,
                          "image" => $image_url,
                          "date_debut" => $date_debut,
                          "date_fin" => $date_fin,
                          "description" => $description,
                      ]);
                      if(is_array($new_event)){
                          $success_message = "L'evennement a été ajouté avec succès";
                          $this->setFlashMessage($success_message, "alert-success");
                          header("Location: /supercar/admin/evennements?event=".$new_event["id_evennement"]);
                      }else{
                          $error_message = "Un problème est survenu lors de l'ajout de l'évennement ! veuillez réassayer plus tard";
                          $this->setFlashMessage($error_message, "alert-error");
                          header("Location: /supercar/admin/evennements/create");
                      }
                  }catch (PDOException $exception) {
                      error_log('Database error: ' . $exception->getMessage());
                      $error_message = "Un problème est survenu lors de l'ajout de l'évennement ! veuillez réassayer plus tard";
                      $this->setFlashMessage($error_message, "alert-error");
                      header("Location: /supercar/admin/evennements");
                  }
            } else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "evennements", "admin");
                exit();
            }
        }

        public function update(): void{
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $this->render("evennements", "admin",);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_event = $_POST["id_event"];
                $title = $_POST["titre"] ?? "";
                $location = $_POST["location"] ?? "";
                $image_url = $_POST["event-img-url"] ?? "";
                $date_debut = $_POST["date_debut"] ?? "";
                $date_fin = $_POST["date_fin"] ?? "";
                $description = $_POST["description"] ?? "";

                try{
                    $new_event = $this->eventModel::create([
                        "id_evennement" => $id_event,
                        "titre" => $title,
                        "location" => $location,
                        "image" => $image_url,
                        "date_debut" => $date_debut,
                        "date_fin" => $date_fin,
                        "description" => $description,
                    ]);
                    if(is_array($new_event)){
                        $success_message = "L'evennement a été modifié avec succès";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/evennements?event=".$new_event["id_evennement"]);
                    }else{
                        $error_message = "Un problème est survenu lors de la modification de l'évennement ! veuillez réassayer plus tard";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/evennements?event=".$id_event);
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenu lors de la modification de l'évennement ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/evennements?event=".$id_event);
                }
            } else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "evennements", "admin");
                exit();
            }
        }

        public function delete(): void{
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $event_id = $_GET["event"] ?? "";
                if(empty($event_id)){
                    $warning_message = "Veuillez preciser l'id de l'Evennement a supprimer";
                    $this->setFlashMessage($warning_message, "alert-warning");
                    header("Location: /supercar/admin/evennements");
                }
                $this->render("delete", "admin", [
                    "confirmation_msg" => "Voulez-vous supprimer cet évennement ?",
                    "id" => $event_id
                ]);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id = $_POST["id"] ?? "";
                try{
                    $deleted = $this->eventModel->delete($id);
                    if($deleted){
                        $success_message = "L'évennement été supprimé avec succès !";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/evennements");
                    }else{
                        $error_message = "L'évennement n'a pas été supprimé, Veuillez réessayer plus tard.";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/evennements");
                    }
                }catch (PDOException $exception) {
                    $warning_message = "Une erreur est survenue lors de la suppression de l'évennement ! Veuillez réessayer plus tard.";
                    $this->setFlashMessage($warning_message, "alert-warning");
                    header("Location: /supercar/admin/evennements");
                }
            }
        }
    }