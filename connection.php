<?php


    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "azienda_esercizio";

    $connessione = new mysqli($server,$user,$password,$db);

    if(mysqli_connect_errno()){
        echo "connessione fallita";
        exit();
    }
    







?>