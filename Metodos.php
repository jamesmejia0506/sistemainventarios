<?php 
require_once('Conexion.php');

class Metodos extends Conexion {
    
    public function __construct(){
        $this->db = parent::__construct();
    }


    //METODO PARA LISTAR TODA LA INFORMACIÓN DE LOS PROVEEDORES
    public function getProveedores(){
        $rows == null; //Entonces nos traera un arreglo que contendra todos los registros que estan en nuestra base de datos 
        $statement = $this->db->prepare("SELECT * FROM proveedores");
        $statement->execute();
        while($result = $statement-> fetch()){//SIEMPRE Y CUANDO HAYAN RESULTADOS EN NUESTRA VARIABLE $RESULT
            $rows[] = $result; //SI OBTUVIMOS 5 REGISTROS ESTOS VAN A SER GUARDADOS DENTRO DE NUESTRO ARREGLO ROWS[] ASIGNANDOLO A LA VARIABLE $RESULT PARA MOSTRARLO
        
        }
        return $rows;
    }

        //METODO PARA LISTAR TODA LA INFORMACIÓN DE LOS INVENTARISTAS
        public function getInventaristas(){
            $rows == null; //Entonces nos traera un arreglo que contendra todos los registros que estan en nuestra base de datos 
            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Inventarista'");
            $statement->execute();
            while($result = $statement-> fetch()){//SIEMPRE Y CUANDO HAYAN RESULTADOS EN NUESTRA VARIABLE $RESULT
                $rows[] = $result; //SI OBTUVIMOS 5 REGISTROS ESTOS VAN A SER GUARDADOS DENTRO DE NUESTRO ARREGLO ROWS[] ASIGNANDOLO A LA VARIABLE $RESULT PARA MOSTRARLO
            
            }
            return $rows;

        }

        //METODO PARA LISTAR TODA LA INFORMACIÓN DE LOS ADMINISTRADORES
        public function getAdministradores(){
            $rows == null; //Entonces nos traera un arreglo que contendra todos los registros que estan en nuestra base de datos 
            $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador'");
            $statement->execute();
            while($result = $statement-> fetch()){//SIEMPRE Y CUANDO HAYAN RESULTADOS EN NUESTRA VARIABLE $RESULT
                $rows[] = $result; //SI OBTUVIMOS 5 REGISTROS ESTOS VAN A SER GUARDADOS DENTRO DE NUESTRO ARREGLO ROWS[] ASIGNANDOLO A LA VARIABLE $RESULT PARA MOSTRARLO
            
            }
            return $rows;
        }
        

}

?>