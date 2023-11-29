<?php

    /* INICIO - Tratamiento de los input type='text' */
    $textoInsercion1 = empty($_POST['textoInsercion1']) ? '' : $_POST['textoInsercion1'];
    $textoInsercion2 = empty($_POST['textoInsercion2']) ? '' : $_POST['textoInsercion2'];
    $textoInsercion3 = empty($_POST['textoInsercion3']) ? '' : $_POST['textoInsercion3'];
    /* FIN - Tratamiento de los input type='text' */

    if (file_exists("../Db/Con1Db.php")){
        // Llamada a la conexión
        require_once "../Db/Con1Db.php";
        // Llamada al modelo
        require_once "../Models/Insercion1Model.php";
    }
    elseif(file_exists("./Db/Con1Db.php")){
        require_once "./Db/Con1Db.php";
    }



    // Instanciacion del objeto
    $oData = new Datos;

    // Llamada al metodo
    $sql = "insert into coches (mar_coc, mod_coc, aut_coc) values ('$textoInsercion1', '$textoInsercion2', '$textoInsercion3')";
    $data = $oData->setData1($sql);
    
    echo $data;

?>