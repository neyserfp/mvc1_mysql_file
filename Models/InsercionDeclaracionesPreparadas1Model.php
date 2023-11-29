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
        public function setDataPreparedStatements1($sql, $par1, $par2, $par3)
        {

            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("ssi", $par1, $par2, $par3);


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