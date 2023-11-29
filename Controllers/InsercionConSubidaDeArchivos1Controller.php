<?php

    /* INICIO - Tratamiento de los input type='text' */
    $textoInsercion1 = empty($_POST['textoInsercion1']) ? '' : $_POST['textoInsercion1'];
    $textoInsercion2 = empty($_POST['textoInsercion2']) ? '' : $_POST['textoInsercion2'];
    $textoInsercion3 = empty($_POST['textoInsercion3']) ? '' : $_POST['textoInsercion3'];
    
    $uploaddir = '../Assets/img/';
    $ficheroInsercion1 = basename($_FILES['ficheroInsercion1']['name']);
    $ficheroInsercionDir = $uploaddir . basename($_FILES['ficheroInsercion1']['name']);

    $extension = pathinfo($ficheroInsercionDir)['extension'];

    //print_r($_FILES);
    //echo "Extensión: ".$extension;
    //echo "<br>";

    move_uploaded_file($_FILES['ficheroInsercion1']['tmp_name'], $ficheroInsercionDir);

    if (file_exists("../Db/Con1Db.php")){
        // Llamada a la conexión
        require_once "../Db/Con1Db.php";
        // Llamada al modelo
        require_once "../Models/InsercionConSubidaArchivos1Model.php";
    }
    elseif(file_exists("./Db/Con1Db.php")){
        require_once "./Db/Con1Db.php";
    }

    // Instanciacion del objeto
    $oData = new Datos;

    // Llamada al metodo
    $sql = "INSERT INTO coches(mar_coc, mod_coc, aut_coc, rut_coc) VALUES (?, ?, ?, ?)";
 
    $data = $oData->setDataUpFile1($sql, $textoInsercion1, $textoInsercion2, $textoInsercion3, $ficheroInsercion1);
    
    echo $data;

?>