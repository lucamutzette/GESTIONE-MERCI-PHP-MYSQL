<?php

    require("../connection.php");
    $categoria_sconto = $_POST['categoria_sconto'];
    $sconto = $_POST['sconto'];

    $sql = "UPDATE merci SET prezzo_vendita = prezzo_vendita-((prezzo_vendita*$sconto)/100) WHERE categoria = '$categoria_sconto'"    ;
    $ris = $connessione->query($sql);

    if($ris!=1){
        header("location: ricerca.php?first=n&update=f&value=".$ricerca."");
    }else{
        header("location: ricerca.php?first=n&update=t&value=".$ricerca."");
    }
?>