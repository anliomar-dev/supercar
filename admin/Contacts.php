<?php

    namespace admin;
    use app\Authentication;
    use app\MainController;
    use app\Paginator;
    use models\Contact;
    use PDOException;

    class Contacts extends MainController
    {
        private Contact $contactModel;
        private Authentication $auth;

        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Evennement
            $this->contactModel = $this->loadModel("Contact");
            $this->auth = new Authentication();
        }

        public function index(): void {
            // check is user is authenticated and redirect to login page if he/she is not or session expired
            $this->auth->is_authenticated("admin", 300);
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
                $next_url = $base_url . "?page=$next_page";
            }

            if($total_pages > 1 && $current_page > 1){
                $prev_page = $current_page - 1;
                $prev_url = $base_url . "?page=$prev_page";
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
                        "current_contact" => $paginated_contacts["data"][0] ?? [],
                    ]
                );
            }
        }

        public function create():void{
            // check is user is authenticated and redirect to login page if he/she is not or session expired
            $this->auth->is_authenticated("admin", 300);
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $this->render("contacts", "admin");
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $firstname = $_POST["firstname"] ?? "";
                $lastname = $_POST["lastname"] ?? "";
                $phone = $_POST["phone"] ?? "";
                $email = $_POST["email"] ?? "";

                try{
                    // Data coming from the POST request
                    $new_contact = $this->contactModel::create([
                        "nom" => $lastname,
                        "prenom" => $firstname,
                        "telephone" => $phone,
                        "email" => $email,
                    ]);
                    if(is_array($new_contact)){
                        $success_message = "Le contact a été ajouté avec succès";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/contacts?contact=".$new_contact["id_contact"]);
                    }else{
                        $error_message = "Un problème est survenu lors de l'ajout du contact ! veuillez réassayer plus tard";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/contacts/create");
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenu lors de l'ajout du contact ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/contacts");
                }
            } else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "contacts", "admin");
                exit();
            }
        }

        public function update():void{
            // check is user is authenticated and redirect to login page if he/she is not or session expired
            $this->auth->is_authenticated("admin", 300);
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $this->render("contacts", "admin");
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_contact = $_POST["id_contact"] ?? "";
                $firstname = $_POST["firstname"] ?? "";
                $lastname = $_POST["lastname"] ?? "";
                $phone = $_POST["phone"] ?? "";
                $email = $_POST["email"] ?? "";
                try{
                    // Data coming from the POST request
                    $new_contact = $this->contactModel::create([
                        "id_contact" => $id_contact,
                        "nom" => $lastname,
                        "prenom" => $firstname,
                        "telephone" => $phone,
                        "email" => $email,
                    ]);
                    if(is_array($new_contact)){
                        $success_message = "Le contact a été modifié avec succès";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/contacts?contact=".$new_contact["id_contact"]);
                    }else{
                        $error_message = "Un problème est survenu lors de l'ajout du contact ! veuillez réassayer plus tard";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/contacts?contact=".$id_contact);
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenu lors de l'ajout du contact ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/contacts?contact=".$id_contact);
                }
            } else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "contacts", "admin");
                exit();
            }
        }

        public function delete(): void{
            // check is user is authenticated and redirect to login page if he/she is not or session expired
            $this->auth->is_authenticated("admin", 300);
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $contact_id = $_GET["contact"] ?? "";
                if(empty($contact_id)){
                    $warning_message = "Veuillez preciser l'id du contact a supprimer";
                    $this->setFlashMessage($warning_message, "alert-warning");
                    header("Location: /supercar/admin/contacts");
                }
                $this->render("delete", "admin", [
                    "confirmation_msg" => "Voulez-vous supprimer ce contact ?",
                    "id" => $contact_id
                ]);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id = $_POST["id"] ?? "";
                try{
                    $deleted = $this->contactModel->delete($id);
                    if($deleted){
                        $success_message = "Le contact a été supprimé avec succès !";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/contacts");
                    }else{
                        $error_message = "Le contact n'a pas été supprimé, Veuillez réessayer plus tard.";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/contacts");
                    }
                }catch (PDOException $exception) {
                    $warning_message = "Une erreur est survenu lors de la suppression du contact ! Veuillez réessayer plus tard.";
                    $this->setFlashMessage($warning_message, "alert-warning");
                    header("Location: /supercar/admin/contacts");
                }
            }
        }
    }