<?php

    if (file_exists("../Db/Con1Db.php")){
        // Llamada a la conexión
        require_once "../Db/Con1Db.php";
        // Llamada al modelo
        require_once "../Models/Consulta2Model.php";
    }
    elseif(file_exists("./Db/Con1Db.php")){
        require_once "./Db/Con1Db.php";
    }

    // Instancia del objeto
    $oData = new Datos;

    // Llamada al método
    $sql = "select * from coches order by mar_coc, mod_coc, aut_coc";
    $data = $oData->getData1($sql);

    if(empty($data))
    {
        echo
        "
            <div class='bloque1 negrita'>
                No hay datos.
            </div>
        ";
    }
    else
    {
        echo
        "
        <div class='bloque0 negrita'>
            <div class='bloque1'>Marca</div>
            <div class='bloque1'>Modelo</div>
            <div class='bloque1'>Autonomia (Km)</div>
            <div class='bloque1'>Imágen</div>
        </div>
        ";
        foreach ($data as $row)
        {
            echo
            "
            <div class='bloque0'>
                <div class='bloque1' param='$row->ide_coc'>$row->mar_coc</div>
                <div class='bloque1'>$row->mod_coc</div>
                <div class='bloque1'>$row->aut_coc</div>
                <div class='bloque1'>
                    <img class='imagen' src='Assets/img/$row->rut_coc '>
                    </img>
                </div>

            </div>
            ";

            //echo 'Test: '$row->rut_coc;
        }
    }

?>