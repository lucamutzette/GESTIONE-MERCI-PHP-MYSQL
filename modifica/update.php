<?php

    require("../connection.php");
    $page = $_GET['page'];
    $id = $_GET['id'];
    $id = (int)$id;
    $categoria = $_POST['categoria'];
    $descrizione = $_POST['descrizione'];
    $costo_unitario = $_POST['costo_unitario'];
    $quantita = $_POST['quantita'];
    $prezzo_vendita = $_POST['prezzo_vendita'];
    $ricerca = $_GET['value'];

    $sql = "UPDATE merci SET categoria = '$categoria', descrizione = '$descrizione', costo_unitario = $costo_unitario, quantita = $quantita, prezzo_vendita = $prezzo_vendita WHERE $id = ID_merce";
    $ris = $connessione->query($sql);

    if($page=="ricerca"){
        if($ris!=1){
            header("location: ../ricerca/ricerca.php?update=f&value=".$ricerca."");
        }else{
            header("location: ../ricerca/ricerca.php?update=t&value=".$ricerca."");
        }
    }else if($page == "visualizza"){
        if($ris!=1){
            header("location: ../visualizza/visualizza.php?update=f&value=".$ricerca."");
        }else{
            header("location: ../visualizza/visualizza.php?update=t&value=".$ricerca."");
        }
    }



?>