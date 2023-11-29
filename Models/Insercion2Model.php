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

        // Inserta y selecciona datos (insert y select)
        public function setGetData1($sql)
        {
            // Ejecutamos una multiconsulta
            if(!$this->mysqli->multi_query($sql))
            {
                $result = "La operacion no se ha podido realizar.";
                // echo "Detalle del error en la consulta (setGetData1) - ";
                // echo "Numero del error: " . $this->mysqli->errno . " - ";
                // echo "Descripcion del error: " . $this->mysqli->error;
            }
            else
            {
                do {
                    
                    // Almacenar los resultados
                    if($result = $this->mysqli->store_result()){
                        while ($rows = $result->fetch_object())
                        {
                            $this-> data[]=$rows;
                        }
                        $result->free();
                    }

                } while ($this->mysqli->more_results() && $this->mysqli->next_result());

            }
            $this->mysqli->close();
            return $this->data;
        }



    }

?>