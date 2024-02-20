<?php 
require_once('../../Conexion.php');

class Administradores extends Conexion {
    
    public function __construct(){
        $this->db = parent::__construct();
    }

    public function add($Nombre, $Apellido, $Usuario, $Password){
        $statement = $this->db->prepare("INSERT INTO usuarios (NOMBRE, APELLIDO, USUARIO, 
        PASSWORD, PERFIL, ESTADO) VALUES (:Nombre, :Apellido, :Usuario, :Password, 'Administrador', 'Activo')");
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Apellido', $Apellido);
        $statement->bindParam(':Usuario', $Usuario);
        $statement->bindParam(':Password', $Password);
        if($statement->execute()){
            header('Location: ../Pages/index.php');//EN CASO DE QUE SEA EXITOSA LA INSERCIÓN NOS DIRIGIMOS AL INDEX PRINCIPAL
        }else{
            header('Location: ../Pages/add.php');//EN CASO DE QUE SEA INCORRECTA LA INSERCIÓN NOS DIRIGIMOS A LA PAGINA DE ADD
        }
    }
    //METODO PARA LISTAR TODA LA INFORMACIÓN DE LOS ADMINISTRADORES
    public function get(){
        //$rows == null; //Entonces nos traera un arreglo que contendra todos los registros que estan en nuestra base de datos 
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador'");
        $statement->execute();
        while($result = $statement-> fetch()){//SIEMPRE Y CUANDO HAYAN RESULTADOS EN NUESTRA VARIABLE $RESULT
            $rows[] = $result; //SI OBTUVIMOS 5 REGISTROS ESTOS VAN A SER GUARDADOS DENTRO DE NUESTRO ARREGLO ROWS[] ASIGNANDOLO A LA VARIABLE $RESULT PARA MOSTRARLO
        
        }
        return $rows;
    }
    //METODO PARA LISTAR LA INFORMACIÓN DE UN SOLO ADMINISTRADOR POR ID
    public function getById($Id){
        //$rows == null; //Entonces nos traera un arreglo que contendra todos los registros que estan en nuestra base de datos 
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE PERFIL = 'Administrador' AND ID_USUARIO = :Id");
        $statement->bindParam(':Id', $Id); //EL ID QUE TENGO DECLADO LE VOY A PASAR EL ID QUE TENGO COMO PARAMETRO
        $statement->execute();
        while($result = $statement-> fetch()){//SIEMPRE Y CUANDO HAYAN RESULTADOS EN NUESTRA VARIABLE $RESULT
            $rows[] = $result; //SI OBTUVIMOS 5 REGISTROS ESTOS VAN A SER GUARDADOS DENTRO DE NUESTRO ARREGLO ROWS[] ASIGNANDOLO A LA VARIABLE $RESULT PARA MOSTRARLO
        
        }
        return $rows;
    }
    //METODO PARA ACTUALIZAR UN ADMINISTRADOR
    public function update($Id, $Nombre, $Apellido, $Usuario, $Password, $Estado){
        $statement = $this->db->prepare("UPDATE usuarios SET NOMBRE = :Nombre, APELLIDO = :Apellido, USUARIO = :Usuario, PASSWORD = :Password, ESTADO = :Estado WHERE ID_USUARIO = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Apellido', $Apellido);
        $statement->bindParam(':Usuario', $Usuario);
        $statement->bindParam(':Password', $Password);
        $statement->bindParam(':Estado', $Estado);
        if($statement->execute()){
            header('Location: ../Pages/index.php');//EN CASO DE QUE SEA EXITOSA LA ACTUALIZACION NOS DIRIGIMOS AL INDEX PRINCIPAL
        }else{
            header('Location: ../Pages/edit.php');//EN CASO DE QUE SEA INCORRECTA LA ACTUALIZACION NOS DIRIGIMOS A LA PAGINA DE ADD
        }

    }
    //METODO PARA ELIMINAR UN ADMINISTRADOR
    public function delete($Id){
        $statement = $this->db->prepare("DELETE FROM usuarios WHERE ID_USUARIO = :Id");
        $statement->bindParam(':Id', $Id);
        if($statement->execute()){
            header('Location: ../Pages/index.php');//EN CASO DE QUE SEA EXITOSA LA ELIMINACIÓN NOS DIRIGIMOS AL INDEX PRINCIPAL
        }else{
            header('Location: ../Pages/delete.php');//EN CASO DE QUE SEA INCORRECTA LA ELIMINACIÓN NOS DIRIGIMOS A LA PAGINA DE ADD
        }
    }

}


?>