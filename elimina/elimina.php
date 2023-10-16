<?php

    require("../connection.php");
    $id=$_GET['id'];
    $id = (int)$id;
    $page = $_GET['page'];
    $ricercaParameter = $_GET['value'];

    $sql = "DELETE FROM merci WHERE merci.ID_merce = $id";

    $ris = $connessione->query($sql);

    if($page=="ricerca"){
        if($ris!=1){
            header("location: ../ricerca/ricerca.php?first=n&elimina=f&value=".$ricercaParameter."");
        }else{
            header("location: ../ricerca/ricerca.php?first=n&elimina=t&value=".$ricercaParameter."");
        }
    }else if($page == "visualizza"){
        if($ris!=1){
            header("location: ../visualizza/visualizza.php?elimina=f&value=".$ricercaParameter."");
        }else{
            header("location: ../visualizza/visualizza.php?elimina=t&value=".$ricercaParameter."");
        }
    }
    


?>