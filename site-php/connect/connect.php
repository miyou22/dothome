<?php
    $host = "localhost";
    $user = "richclub9";
    $pass = "Forever0!";
    $db = "richclub9";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    if( mysqli_connect_errno() ){
        echo "Database Connect False";
    } else {
        //echo "Database Connect True";
    }
?>