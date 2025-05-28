<?php

    namespace admin;

    use app\Authentication;
    use app\Authorization;
    use app\MainController;
    use app\Paginator;
    use models\Marque;
    use PDOException;

    class Marques extends MainController
    {
        private Marque $marqueModele;
        private Authentication $auth;
        private Authorization $authorization;

        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\marque
            $this->marqueModele = $this->loadModel("Marque");
            $this->auth = new Authentication();
            $this->authorization = new Authorization();
        }


        public function index(): void {
            // check is user is authenticated and redirect to login page if he/she is not or session expired
            $this->auth->is_authenticated("admin", 300);
            $this->authorization->is_staff();
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
                $next_url = $base_url . "?page=$next_page";
            }

            if($total_pages > 1 && $current_page > 1){
                $prev_page = $current_page - 1;
                $prev_url = $base_url . "?page=$prev_page";
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
                        "current_brand" => $paginated_brands["data"][0] ?? [],
                    ]
                );
            }
        }


        public function create(): void{
            // check is user is authenticated and redirect to login page if he/she is not or session expired
            $this->auth->is_authenticated("admin", 300);
            $this->authorization->is_staff();
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $this->render("marques", "admin",);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $brand_name = $_POST["nom_marque"] ?? "";
                $logo = $_POST["logo"] ?? "";

                if($this->marqueModele->isRowExists("marque", "nom", $brand_name)){
                    $warning_message = "Une marque avec ce nom exite dejà";
                    self::setFlashMessageAndRender($warning_message, "alert-warning", "marques", "admin");
                    exit();
                }

                try{
                    // Data coming from the POST request
                    $new_brand = $this->marqueModele::create([
                        "nom" => $brand_name,
                        "logo" => $logo,
                    ]);
                    if(is_array($new_brand)){
                        $success_message = "La marque a été ajouté avec succès";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/marques?brand=".str_replace(" ", "-", $brand_name));
                    }else{
                        $error_message = "Un problème est survenu lors de l'ajout de la nouvelle marque ! veuillez réassayer plus tard";
                        $this->setFlashMessage($error_message, "alert-error");
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenu lors de l'ajout de la nouvelle marque ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                }
            }
            else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "marque", "admin");
                exit();
            }
        }

        public function update(): void{
            // check is user is authenticated and redirect to login page if he/she is not or session expired
            $this->auth->is_authenticated("admin", 300);
            $this->authorization->is_staff();
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $this->render("marques", "admin",);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_marque = $_POST["id_marque"] ?? "";
                $brand_name = $_POST["nom_marque"] ?? "";
                $logo = $_POST["logo"] ?? "";

                if(empty($id_marque)){
                    $warning_message = "identifiant(id) invalid";
                    $this->setFlashMessage($warning_message, "alert-warning");
                    header("Location: /supercar/admin/marques");
                }

                try{
                    // Data coming from the POST request
                    $new_brand = $this->marqueModele::create([
                        "id_marque" => $id_marque,
                        "nom" => $brand_name,
                        "logo" => $logo,
                    ]);
                    if(is_array($new_brand)){
                        $success_message = "Modifications effectuées avec succès";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/marques?brand=".str_replace(" ", "-", $new_brand["nom"]));
                    }else{
                        $error_message = "Un problème est survenu lors de la modification de la marque ! veuillez réassayer plus tard";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/marques?brand=".str_replace(" ", "-", $new_brand["nom"]));
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenu lors de la modification de la marque ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/marques?brand=".str_replace(" ", "-", $brand_name));
                }
            }
            else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "marques", "admin");
                exit();
            }
        }


        public function delete(): void{
            // check is user is authenticated and redirect to login page if he/she is not or session expired
            $this->auth->is_authenticated("admin", 300);
            $this->authorization->is_staff();
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $brand_id = $_GET["brand"] ?? "";
                if(empty($brand_id)){
                    $warning_message = "Veuillez preciser l'id de la marque a supprimer";
                    $this->setFlashMessage($warning_message, "alert-warning");
                    header("Location: /supercar/admin/marques");
                }
                $this->render("delete", "admin", [
                    "confirmation_msg" => "Voulez-vous supprimer cette marque ?",
                    "id" => $brand_id
                ]);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id = $_POST["id"] ?? "";
                try{
                    $deleted = $this->marqueModele->delete($id);
                    if($deleted){
                        $success_message = "La marque a été supprimé avec succès !";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/marques");
                    }else{
                        $error_message = "La marque n'a pas été supprimé, Veuillez réessayer plus tard.";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/marques");
                    }
                }catch (PDOException $exception) {
                    $warning_message = "Une erreur est survenue lors de la suppressions de la marque ! Veuillez réessayer plus tard.";
                    $this->setFlashMessage($warning_message, "alert-warning");
                    header("Location: /supercar/admin/marques");
                }
            }
        }
    }