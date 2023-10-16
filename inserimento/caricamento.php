<?php

    require("../connection.php");

    $categoria = $_POST['categoria'];
    $descrizione = $_POST['descrizione'];
    $costo_unitario = $_POST['costo_unitario'];
    $quantita = $_POST['quantita'];
    $prezzo_vendita = $_POST['prezzo_vendita'];

    $sql = "INSERT INTO merci (categoria,descrizione,costo_unitario,quantita,prezzo_vendita) VALUES ('$categoria', '$descrizione', $costo_unitario, $quantita, $prezzo_vendita)";
    $ris = $connessione->query($sql);

    if($ris!=1){
        header("location: inserimento.html?inserimento=f");
    }else{
        header("location: inserimento.html?inserimento=t");
    }



?>