<?php

    namespace admin;
    use app\Authentication;
    use app\MainController;
    use app\Paginator;
    use models\Image;
    use PDOException;

    class Images extends MainController
    {
        private Image $imageModele;
        private Authentication $auth;

        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Evennement
            $this->imageModele = $this->loadModel("Image");
            $this->auth = new Authentication();
        }

        public function index(): void {
            // check is user is authenticated and redirect to login page if he/she is not or session expired
            $this->auth->is_authenticated("admin", 300);
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
                        "all_cars" => $this->imageModele->getAllCars(), //get all cars in table modele
                    ]
                );
            }else{
                $this->render(
                    "images", "admin",
                    [
                        "current_image" => $paginated_images["data"][0] ?? [],
                        "all_cars" => $this->imageModele->getAllCars(),
                    ]
                );
            }
        }

        public function create(): void{
            // check is user is authenticated and redirect to login page if he/she is not or session expired
            $this->auth->is_authenticated("admin", 300);
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $all_cars = $this->imageModele->getAllCars();
                $this->render("images", "admin", [
                    "all_cars" => $all_cars
                ]);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $car_id = $_POST["car_id"];
                $image_url = $_POST["image-url"];
                $image_type = $_POST["image-type"];
                $color = $_POST["color"];
                try{
                    // Data coming from the POST request
                    $new_image = $this->imageModele::create([
                        "url" => $image_url,
                        "type" => $image_type,
                        "couleur" => $color,
                        "id_modele" => $car_id
                    ]);
                    if(is_array($new_image)){
                        $success_message = "L'image a été ajouté avec succès";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/images?image=".$new_image["id_image"]);
                    }else{
                        $error_message = "Un problème est survenu lors de l'ajout de la nouvelle image ! veuillez réassayer plus tard";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/images/create");
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenu lors de l'ajout de la nouvelle image ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/images/create");
                }
            } else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "images", "admin");
                exit();
            }
        }

        public function update(): void{
            // check is user is authenticated and redirect to login page if he/she is not or session expired
            $this->auth->is_authenticated("admin", 300);
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $all_cars = $this->imageModele->getAllCars();
                $this->render("images", "admin", [
                    "all_cars" => $all_cars
                ]);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $image_id = $_POST["id_image"];
                $car_id = $_POST["car_id"];
                $image_url = $_POST["image-url"];
                $image_type = $_POST["image-type"];
                $color = $_POST["color"];
                try{
                    // Data coming from the POST request
                    $new_image = $this->imageModele::create([
                        "id_image" => $image_id,
                        "url" => $image_url,
                        "type" => $image_type,
                        "couleur" => $color,
                        "id_modele" => $car_id
                    ]);
                    if(is_array($new_image)){
                        $success_message = "L'image a été modifié avec succès";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/images?image=".$new_image["id_image"]);
                    }else{
                        $error_message = "Un problème est survenu lors de la modification de la nouvelle image ! veuillez réassayer plus tard";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/images/create?image=$image_id");
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenu lors de la modification de l'image ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/images/create?image=$image_id");
                }
            } else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "images", "admin");
                exit();
            }
        }

        public function delete(): void{
            // check is user is authenticated and redirect to login page if he/she is not or session expired
            $this->auth->is_authenticated("admin", 300);
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $image_id = $_GET["image"] ?? "";
                if(empty($image_id)){
                    $warning_message = "Veuillez preciser l'id de l'image' a supprimer";
                    $this->setFlashMessage($warning_message, "alert-warning");
                    header("Location: /supercar/admin/images");
                }
                $this->render("delete", "admin", [
                    "confirmation_msg" => "Voulez-vous supprimer cette image ?",
                    "id" => $image_id
                ]);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id = $_POST["id"] ?? "";
                try{
                    $deleted = $this->imageModele->delete($id);
                    if($deleted){
                        $success_message = "L'image a été supprimé avec succès !";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/images");
                    }else{
                        $error_message = "L'image' n'a pas été supprimé, Veuillez réessayer plus tard.";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/images");
                    }
                }catch (PDOException $exception) {
                    $warning_message = "Une erreur est survenue lors de la suppression de l'image' ! Veuillez réessayer plus tard.";
                    $this->setFlashMessage($warning_message, "alert-warning");
                    header("Location: /supercar/admin/images");
                }
            }
        }

    }