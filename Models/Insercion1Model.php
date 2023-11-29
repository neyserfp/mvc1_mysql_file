<?php

    class Datos
    {

        private $mysqli;
        private $data;

        public function __construct()
        {
            $this->mysqli=Connection::conn1();
            $this->data=array();
        }

        // No devuelve datos de la BD (insert, update, delete)
        public function setData1($sql)
        {
            if(!$this->mysqli->query($sql))
            {
                $result = "La operacion no se ha podido realizar.";
                // echo "Detalle del error en la consulta (setData1) - ";
                // echo "Numero del error: " . $this->mysqli->errno . " - ";
                // echo "Descripcion del error: " . $this->mysqli->error;
            }
            else
            {
                $result = "Operacion realizada con exito";
            }
            $this->mysqli->close();
            return $result;
        }

    }

?>