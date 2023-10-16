<?php

    require("../connection.php");

    $id = $_GET['id'];
    $page = $_GET['page'];
    $ricercaParameter = $_GET['value'];


    $sql = "SELECT * FROM merci WHERE $id = ID_merce ";
    $ris = $connessione->query($sql);
    $row =  $ris->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inserimento-modifca.css">
    <title>Aggiornamento</title>
</head>
<body>
    <div class="page">
        <div class="nav-bar">
            <div class="titolo-container">
                <h1>Aggiornamento</h1>
            </div>

            <div class="back-home-container">
                <a  id="link-indietro"href="../"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3a3a3a" viewBox="0 0 256 256"><path d="M128,20A108,108,0,1,0,236,128,108.12,108.12,0,0,0,128,20Zm0,192a84,84,0,1,1,84-84A84.09,84.09,0,0,1,128,212Zm52-84a12,12,0,0,1-12,12H117l11.52,11.51a12,12,0,0,1-17,17l-32-32a12,12,0,0,1,0-17l32-32a12,12,0,0,1,17,17L117,116h51A12,12,0,0,1,180,128Z"></path></svg>Torna indietro</a>
            </div>
        </div>

        <div class="form-container">
            <form action="update.php?id=<?php echo $id ?>&page=<?php echo $page ?>&value=<?php echo $ricercaParameter?>" method="post">
                <label for="">Categoria</label>
                <input type="text" name="categoria" value="<?php echo $row['categoria'] ?>">

                <label for="">Descrizione</label>
                <input type="text" name="descrizione" value="<?php echo $row['descrizione'] ?>">

                <label for="">Costo unitario</label>
                <input type="number" step=0.01 name="costo_unitario" value="<?php echo $row['costo_unitario'] ?>">

                <label for="">Quantita</label>
                <input type="number" step=1 name="quantita" value="<?php echo $row['quantita'] ?>">

                <label for="">Prezzo vendita</label>
                <input type="number" step=0.01 name="prezzo_vendita" value="<?php echo $row['prezzo_vendita'] ?>">

                <input type="submit" value="Invia">
            </form>
        </div>
    </div>

    <script>

        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        let page = urlParams.get("page");
        let link = document.getElementById("link-indietro");

        if(page=="visualizza"){
            link.href="../visualizza/visualizza.php?value=<?php echo $ricercaParameter?>"
        }

        if(page=="ricerca"){
            link.href="../ricerca/ricerca.php?value=<?php echo $ricercaParameter?>"
        }
    </script>

</body>
</html>