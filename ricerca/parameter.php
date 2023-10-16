<?php

    $ricerca = $_POST['ricerca'];
    $categoria_select = $_POST['categoria_select'];
    if($categoria_select){
        $categoria_select = 1;
    }
    $descrizione_select = $_POST['descrizione_select'];
    if($descrizione_select){
        $descrizione_select = 1;
    }
    $id_select = $_POST['id_select'];
    if($id_select){
        $id_select = 1;
    }

    if($id_select!=0){
        $tipodato="id";

    }else{
        $tipodato="categorie";
    }

    header("location: ricerca.php?first=n&tiporicerca=".$tipodato."&ricerca=".$ricerca."&categoria_select=".$categoria_select."&descrizione_select=".$descrizione_select."&id_select=".$id_select."")



?>