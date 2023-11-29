<?php
    // Llamada al modelo
    require_once "./Models/Consulta1Model.php";

    if (file_exists("../Db/Con1Db.php")){
        // Llamada a la conexión
        require_once "../Db/Con1Db.php";
    }
    elseif(file_exists("./Db/Con1Db.php")){
        require_once "./Db/Con1Db.php";

    }


    // Tratamiento de los imput text
    $textoConsulta1 = empty($_POST['textoConsulta1']) ? '' : $_POST['textoConsulta1'];

    // Instanciación de un objeto
    $oData = new Datos;

    // Llamada al método
    $sql = "select * from coches where mar_coc like '%$textoConsulta1%' or mod_coc like '%$textoConsulta1%' or aut_coc like '%$textoConsulta1%' order by mar_coc, mod_coc, aut_coc";

    $data = $oData->getData1($sql);


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
                </div>
            ";
        }
    }
    

    


?>