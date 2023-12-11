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

        public function setRoutefile1($sql, $extension)
        {

            $stmt = $this->mysqli->prepare($sql);
            //print_r($stmt);
            //print_r($this->mysqli->insert_id);

            $id = 1;
            //$id = mysql_insert_id($this->mysqli);

            $ultimoId = mysqli_insert_id($this->mysqli);

            // $tuConexion debe ser la variable que contiene la conexión a la base de datos
            echo "El último ID insertado es: " . $ultimoId;

            //print_r($this->mysqli->insert_id);

            $stmt->bind_param("si", $extension, $id);

            //echo "ID: ".$this->mysqli->insert_id;

            //echo $stmt;


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