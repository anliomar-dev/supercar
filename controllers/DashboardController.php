<?php

namespace controllers;

use app\MainController;
use app\Authentication;
use DateTime;
use Exception;
use models\Marque;

class DashboardController extends MainController
{
    private Authentication $auth;
    private Marque $marqueModel; 
    
    public function __construct(){
        $this->auth = new Authentication();
        $this->marqueModel = new Marque();
    }

    public function index():void{
        header('Location: /supercar/dashboard/mes_donnees');
    }

    public function compte():void{
        //$this->auth->is_authenticated();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "posted from compte view";
            exit();
        }
        $this->render("compte", "", ["ui" => "Compte"]);
    }

    public function mes_donnees():void{
        //$this->auth->is_authenticated();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "posted from mes_donnees";
            exit();
        }
        $this->render("mes_donnees", "", ["ui" => "Mes données"]);
    }

    public function mes_essais():void{
        //$this->auth->is_authenticated();
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
        //$this->auth->is_authenticated();
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
                exit();
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
        }
        $this->render("demande_essai", "", ["all_brands" => $all_brands]);
    }
}