<?php namespace Models;
    /**
     * Clase para la conexion a base de datos
     */
    class Conexion {

        private $datos = array(
            "host" => "localhost",
            "user" => "root",
            "pass" => "123456",
            "db" => "dbproyecto1"
        );

        private $con;

        public function __construct() {
            # code...
            $this->con = new \mysqli(
                $this->datos['host'],
                $this->datos['user'],
                $this->datos['pass'],
                $this->datos['db']
            );

            /*if (!$this->con) {
                # code...
            }else {
                echo "Conexion realizada correctamente";
            }*/
        }

        public function consulta($sql){
            try{
            $valida = $this->con->query($sql);
            if ($valida) {
                # code...
                //echo "Consulta exitosa";
                echo $valida;
                return $valida;
                }else {
                    echo "Consulta erronea ;)";
                    echo mysqli_error($this->con);
                }
            }catch(Exception $else){
                echo "<h3>Exception en: </h3>" . $else->getMessage();
            }
        }

        public function consultaRetorno($sql){
            try{
            $datos = $this->con->query($sql);
            //echo mysqli_error($this->con);
            return $datos;
        }catch(Exception $e){
            print "Error en la consulta: " . $e->getMessage();
        }
        }
    }

?>
