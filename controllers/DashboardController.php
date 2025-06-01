<?php

namespace controllers;

use app\MainController;
use app\Authentication;
use DateTime;
use Exception;
use models\Essai;
use models\Marque;
use models\Utilisateur;
use PDOException;

class DashboardController extends MainController
{
    private Authentication $auth;
    private Marque $marqueModel;
    private Essai $essaiModel;
    private Utilisateur $utilisateurModel;
    
    public function __construct(){
        $this->auth = new Authentication();
        $this->marqueModel = new Marque();
        $this->essaiModel = new Essai();
        $this->utilisateurModel = new Utilisateur();
    }

    public function index():void{
        $this->auth->is_authenticated();
        header('Location: /supercar/dashboard/profile');
    }

    public function change_password():void{
        $this->auth->is_authenticated();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            var_dump($_POST);
            $current_password = $_POST["current_password"] ?? "";
            $new_password = $_POST["new_password"] ?? "";
            $confirm_password = $_POST["confirm_password"] ?? "";
            if(empty($current_password) || empty($new_password) || empty($confirm_password)){
                $error_message = "Tous les champs doivent être correctement remplis !";
                self::setFlashMessage($error_message, "alert-error");
                header('Location: /supercar/dashboard/change_password');
                exit();
            }
            if($new_password != $confirm_password){
                $error_message = "Les mots de passe ne correspondent pas !";
                self::setFlashMessage($error_message, "alert-error");
                header('Location: /supercar/dashboard/change_password');
                exit();
            }
            $user_id = $_SESSION["user_id"];
            $current_password_correct = $this->utilisateurModel->checkPassword($user_id ,$current_password);
            if($current_password_correct){
                $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
                $set_password = $this->utilisateurModel->changePassword($user_id, $hashed_password);
                if($set_password){
                    $success_message = "Votre mot de passe a été modifié avec succès !";
                    self::setFlashMessage($success_message, "alert-success");
                    header('Location: /supercar/dashboard/change_password');
                    exit();
                }
                $error_message = "Une erreur inattendue est survenue ! Veuillez réessayer.";
                self::setFlashMessage($error_message, "alert-error");
                header('Location: /supercar/dashboard/change_password');
                exit();

            }else{
                $error_message = "Le mot de passe est incorrect !";
                self::setFlashMessage($error_message, "alert-error");
                header('Location: /supercar/dashboard/change_password');
                exit();
            }

        }
        $this->render("change_password", "");
    }

    public function profile():void{
        $this->auth->is_authenticated();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $firstname = $_POST["firstname"] ?? "";
            $lastname = $_POST["lastname"] ?? "";
            $email = $_POST["email"] ?? "";
            $phone = $_POST["phone"] ?? "";
            $address = $_POST["address"] ?? "";
            $required_fields = [$firstname, $lastname, $address, $phone, $email];

            $all_fields_filled = array_reduce($required_fields, function($result, $item){
                return $result && !empty(trim($item));
            }, true);
            if(!$all_fields_filled){
                $error_message = "Tous les champs doivent être correctement remplis";
                $this->setFlashMessage($error_message, "alert-error");
                header("Location: /supercar/dashboard/profile");
                exit();
            }
            $new_user_data = [
                "id_utilisateur" => $_SESSION["user_id"],
                "prenom" => $firstname,
                "nom" => $lastname,
                "email" => $email,
                "telephone" => $phone,
                "adresse" => $address
            ];
            try{
                $new_user_profile = $this->utilisateurModel::create($new_user_data);
                if(is_array($new_user_profile)){
                    // updated session with new data(prenom, nom, email)
                    $_SESSION["username"] = $new_user_profile["prenom"] . " " . $new_user_profile["nom"];
                    $success_message = "Votre profile a été modifié avec succès";
                    $this->setFlashMessage($success_message, "alert-success");
                    header("Location: /supercar/dashboard/profile");
                    exit();
                }else{
                    $error_message = "Un problème est survenur lors de la modification du profile ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/dashboard/profile");
                    exit();
                }


            }catch(Exception $e){
                $error_message = "Une erreur inattendue est survenue !";
                $this->setFlashMessage($error_message, "alert-error");
                header("Location: /supercar/dashboard/profile");
                exit();
            }
        }
        else if($_SERVER["REQUEST_METHOD"] == "GET"){
            $param = ["id_utilisateur" => $_SESSION["user_id"]];
            $current_user_data = $this->utilisateurModel->getByColumn($param);
            $this->render("profile", "", ["current_user_data" => $current_user_data]);
        }
    }

    public function mes_essais():void{
        $this->auth->is_authenticated();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "posted from mes_essais";
            exit();
        }
        $this->render("mes_essais", "", ["ui" => "Mes essais"]);
    }

    /**
     * @throws Exception
     */
    public function demande_essai():void{
        $this->auth->is_authenticated();
        $all_brands = $this->marqueModel->getAllBrands();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $date = $_POST["date"];
            $time = $_POST["time"];
            $brand = $_POST["brand"];
            $car  = $_POST["car"];
            $today = date("Y-m-d");

            // convert test drive date and todoy date in a date obj
            $dateObj = new DateTime($date);
            $todayObj = new DateTime($today);
            $interval = $todayObj->diff($dateObj); // calculate difference in days

            //convert given time from string to time obj eg: '21:30' => 21:30
            $timeObj = DateTime::createFromFormat('H:i', $time);
            $minutes = $timeObj->format('i');
            $startTime = DateTime::createFromFormat('H:i', '08:30');
            $endTime = DateTime::createFromFormat('H:i', '16:00');

            if($interval->days < 7){
                $warning_message = "La date de l'essai doit être au minium 7 jours après la demande.";
                self::setFlashMessage($warning_message, "alert-warning");
                header('Location: demande_essai');
            }
            if ($timeObj < $startTime || $timeObj > $endTime) {
                $warning_message = "Veuillez choisir un horaire entre 08:30 et 16:00, avec un interval de 30 minutes.";
                self::setFlashMessage($warning_message, "alert-warning");
                header('Location: demande_essai');
                exit();
            }elseif($minutes != 00 && $minutes != 30){
                $warning_message = "Veuillez choisir un horaire entre 08:30 et 16:00, avec un interval de 30 minutes.";
                self::setFlashMessage($warning_message, "alert-warning");
                header('Location: demande_essai');
                exit();
            }
            try{
                // Data coming from the POST request
                $new_demande_essai = $this->essaiModel::create([
                    "date_essai" => $date,
                    "heure" => $time,
                    "id_marque" => $brand,
                    "id_modele" => $car,
                    "id_utilisateur" => $_SESSION["user_id"]
                ]);
                if(is_array($new_demande_essai)){
                    $success_message = "Votre demande a été enregistré.";
                    $this->setFlashMessage($success_message, "alert-success");
                }else{
                    $error_message = "Un problème est survenur lors de l'enregistrement de votre demande ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                }
            }catch (PDOException $exception) {
                error_log('Database error: ' . $exception->getMessage());
                $error_message = "Un problème est survenur lors de l'enregistrement de votre demande ! veuillez réassayer plus tard";
                $this->setFlashMessage($error_message, "alert-error");
            }
            header('Location: demande_essai');
            exit();
        }
        $this->render("demande_essai", "", ["all_brands" => $all_brands]);
    }
}