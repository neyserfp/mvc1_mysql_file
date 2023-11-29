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
        require_once "../Models/Insercion2Model.php";
    }
    elseif(file_exists("./Db/Con1Db.php")){
        require_once "./Db/Con1Db.php";
        require_once "./Models/Insercion2Model.php";
    }

    // Instanciacion del objeto
    $oData = new Datos;

    // Llamada al metodo
    $sql = "insert into coches (mar_coc, mod_coc, aut_coc) values ('$textoInsercion1', '$textoInsercion2', '$textoInsercion3');";
    $sql.= "select * from coches;";

    $data = $oData->setGetData1($sql);

    if(empty($data))
    {
        echo
        "
            <div class='bloque1 negrita'>
                No hay datos
            </div>
        ";
    }
    else
    {
        echo
        "
            <div class='bloque1 negrita'>
                <div class='bloque1'>Marca</div>
                <div class='bloque1'>Modelo</div>
                <div class='bloque1'>Autonomía</div>
                <div class='bloque1'>Imágen</div>
            </div>     
        ";
        foreach($data as $row)
        {
            echo
            "
                <div class='bloque0'>    
                    <div class='bloque1'>$row->mar_coc</div>
                    <div class='bloque1'>$row->mod_coc</div>
                    <div class='bloque1'>$row->aut_coc</div>
                    <div class='bloque1'>
                    <img class='imagen' src='Assets/img/$row->rut_coc '>
                    </img>
                </div>
                </div>
            ";
        }
    }
    
    //echo $data;

?>