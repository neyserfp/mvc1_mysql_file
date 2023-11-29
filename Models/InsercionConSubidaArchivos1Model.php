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
        public function setDataUpFile1($sql, $par1, $par2, $par3, $par4)
        {

            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("ssis", $par1, $par2, $par3, $par4);


            if(!$stmt->execute())
            {
                $result = "La operacion no se ha podido realizar.";

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