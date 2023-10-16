<?php

    require("../connection.php"); //Richiesta connessione

    $first = $_GET['first']; //Controlla se è la prima volta che si accede alla pagina
    $ricercaParameter = $_GET['value'];

        
    $tiporicerca = $_GET['tiporicerca'];
    $ricerca = $_GET['ricerca'];
    $categoria_select = (int)$_GET['categoria_select'];
    $descrizione_select = (int)$_GET['descrizione_select'];
    $id_select = (int)$_GET['id_select'];


    
    if($ricercaParameter!=""){
        $sql = "SELECT * FROM merci WHERE '$ricercaParameter' = merci.categoria OR '$ricercaParameter'  = merci.descrizione";
        $ris = $connessione->query($sql);
    }
    if($id_select!=0){
        $sql = "SELECT * FROM merci WHERE '$ricerca' = merci.ID_merce";
        $ris = $connessione->query($sql);
    }else{
        if($categoria_select != 0 && $descrizione_select !=0){
            $sql = "SELECT * FROM merci WHERE '$ricerca' = merci.categoria OR '$ricerca' = merci.descrizione";
            $ris = $connessione->query($sql);
        }
        
        if($categoria_select == 0 && $descrizione_select !=0){
            $sql = "SELECT * FROM merci WHERE '$ricerca' = merci.descrizione";
            $ris = $connessione->query($sql);
        }
    
        if($categoria_select != 0 && $descrizione_select ==0){
            $sql = "SELECT * FROM merci WHERE '$ricerca' = merci.categoria";
            $ris = $connessione->query($sql);
        }
    }
        
    
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ricerca.css">
    <title>Risultato</title>
</head>
<body>
    <div class="page">
        <div class="nav-bar">
            <div class="titolo-container">
                <h1>Ricerca e modifica</h1>
            </div>

            <div class="back-home-container">
                <a href="../index.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#3a3a3a" viewBox="0 0 256 256"><path d="M128,20A108,108,0,1,0,236,128,108.12,108.12,0,0,0,128,20Zm0,192a84,84,0,1,1,84-84A84.09,84.09,0,0,1,128,212Zm52-84a12,12,0,0,1-12,12H117l11.52,11.51a12,12,0,0,1-17,17l-32-32a12,12,0,0,1,0-17l32-32a12,12,0,0,1,17,17L117,116h51A12,12,0,0,1,180,128Z"></path></svg>Torna alla home</a>
            </div>
        </div>

        <div class = "table-container">
            <div class= "ricerca-container">
                <form action="parameter.php" method="post">
                    <input type="search" name="ricerca" id="" placeholder="Categoria o Descrizione" required>
                    <div class="opzion-container">
                        <div class="checkbox-container">
                            <div class="checkbox">
                                <label for="categoria_select">Categoria</label>
                                <input type="checkbox" name="categoria_select" id="categoria_select" onclick="checkedds()" checked>
                            </div>

                            <div class="checkbox">
                                <label for="descrizione_select">Descrizione</label>
                                <input type="checkbox" name="descrizione_select" id="descrizione_select" onclick="checkedds()" checked >
                            </div>

                            <div class="checkbox">
                                <label for="id_select">Id Merce</label>
                                <input type="checkbox" name="id_select" id="id_select" onclick="checkedid()">
                            </div>

                        </div>
                        

                        <input type="submit" value="Ricerca">
                    </div>

                    
                
                    
                </form>
            </div>
            
            <?php
            if($ris->num_rows>0){
                ?>
                <div class="table-t-container">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Categoria</th>
                            <th>Descrizione</th>
                            <th>Costo Unitario</th>
                            <th>Quantita</th>
                            <th>Prezzo Vendita</th>
                            <th>Elimina</th>
                            <th>Aggiorna</th>
                        </tr>
                        <?php
                            foreach($ris as $riga){
                                echo "<tr>";
                                    echo "<td>".$riga['ID_merce']."</td>";
                                    echo "<td>".$riga['categoria']."</td>";
                                    echo "<td>".$riga['descrizione']."</td>";
                                    echo "<td>".$riga['costo_unitario']."</td>";
                                    echo "<td>".$riga['quantita']."</td>";
                                    echo "<td>".$riga['prezzo_vendita']."</td>";
                                    echo "<td>"."<a href='../elimina/elimina.php?id=".$riga["ID_merce"]."&page=ricerca&value=".$ricerca."'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='#fa1e1e' viewBox='0 0 256 256'><path d='M216,48H180V36A28,28,0,0,0,152,8H104A28,28,0,0,0,76,36V48H40a12,12,0,0,0,0,24h4V208a20,20,0,0,0,20,20H192a20,20,0,0,0,20-20V72h4a12,12,0,0,0,0-24ZM100,36a4,4,0,0,1,4-4h48a4,4,0,0,1,4,4V48H100Zm88,168H68V72H188ZM116,104v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Zm48,0v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Z'></path></svg></a>"."</td>";
                                    echo "<td>"."<a href='../modifica/modifica.php?id=".$riga["ID_merce"]."&page=ricerca&value=".$ricerca."'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='#4a9eff' viewBox='0 0 256 256'><path d='M230.14,70.54,185.46,25.85a20,20,0,0,0-28.29,0L33.86,149.17A19.85,19.85,0,0,0,28,163.31V208a20,20,0,0,0,20,20H92.69a19.86,19.86,0,0,0,14.14-5.86L230.14,98.82a20,20,0,0,0,0-28.28ZM93,180l71-71,11,11-71,71ZM76,163,65,152l71-71,11,11ZM52,173l15.51,15.51h0L83,204H52ZM192,103,153,64l18.34-18.34,39,39Z'></path></svg></a>"."</td>";
                                echo "</tr>";

                            }
                        ?>
                    </table>
                </div>
            <?php
            }else if($first=="n"){
            ?>
                <div class="nessuna-corrispondenza">
                    <h1>Nessuna corrispondenza</h1>
                </div>
            <?php 
            }else{
            ?>
                <div>
                    <h1></h1>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="notifica" id="notifica">
        <h2 id="text-notifica"></h2>
    </div>

    <div class="aggiornamento-prezzo-container" id="sconto-area">
        <form class="form-aggiornamento" action="sconto.php" method="post">
            <input type="text" name="categoria_sconto" id="categoria_sconto" placeholder="Categoria" value="<?php if($tiporicerca=="categoria"){echo $ricerca;}else{echo "";}?>">
            <input type="number" name="sconto" id="" placeholder="Sconto">
            <input type="submit">
        </form>

    </div>

    <script>

        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        let elimina = urlParams.get("elimina");
        let update = urlParams.get("update");
        let first = urlParams.get("first");
        let ricerca = urlParams.get("value");
        let tipoRicerca = urlParams.get("tiporicerca");
        let textNotifica = document.getElementById('text-notifica');
        let scontoArea = document.getElementById('sconto-area');
        function hidden(){
           notifica.style.visibility = "hidden";
        }


        if(first=="n"){
            if(tipoRicerca=="categoria"){
            document.getElementById("id_select").checked = false;
            document.getElementById("categoria_select").checked = true;
            document.getElementById("descrizione_select").checked = true;
            }else if(tipoRicerca=="id"){
            document.getElementById("id_select").checked = true;
            document.getElementById("categoria_select").checked = false;
            document.getElementById("descrizione_select").checked = false;
        }
        }
        


        if(elimina=="t"){
            textNotifica.innerHTML = "Eliminazione riuscita";
            notifica.style.visibility = "visible"
            window.setTimeout(hidden, 3000)
        }

        if(update=="t"){
            textNotifica.innerHTML = "Aggiornamento riuscito";
            notifica.style.visibility = "visible"
            window.setTimeout(hidden, 3000)
        }



        if(first=="n" && document.getElementById("categoria_select").checked == true){
            scontoArea.style.visibility = "visible";
        }

        function checkedds() {
            document.getElementById("id_select").checked = false;
            if(first=="n"){
                scontoArea.style.visibility = "visible";
            }else{
                scontoArea.style.visibility = "visible";
            }
            

        }

        function checkedid(){
            document.getElementById("id_select").checked = true;
            document.getElementById("categoria_select").checked = false;
            document.getElementById("descrizione_select").checked = false;
            if(first=="n"){
                scontoArea.style.visibility = "hidden";
            }else{
                scontoArea.style.visibility = "hidden";
            }
        }
    </script>


</body>
</html>