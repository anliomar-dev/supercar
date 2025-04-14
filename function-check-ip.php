<?php

    // start new session if there is not a session
    include_once('php/connexionDB.php');
    function verify_ip($ip): void
    {
        global $DB;
        $ip = mysqli_real_escape_string($DB, $ip);

        $query = "SELECT ip FROM blacklist_ip WHERE ip = '$ip';";

        $result = mysqli_query($DB, $query);

        if (mysqli_num_rows($result) > 0) {
            // Si l'IP existe, rediriger vers la page de permission refusée
            header("Location: /super-car/supercar/permission_denied.html");
            exit(); // Stopper l'exécution après la redirection
        }

        mysqli_free_result($result);
    }

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Si l'utilisateur passe par un proxy, l'IP est dans cette variable
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Si l'utilisateur ne passe pas par un proxy, on récupère l'IP directement
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    // Si l'IP contient plusieurs adresses (provenant de plusieurs proxies), on prend la première
    if (strpos($ip, ',') !== false) {
        $ip = explode(',', $ip)[0];
    }

    verify_ip($ip);
