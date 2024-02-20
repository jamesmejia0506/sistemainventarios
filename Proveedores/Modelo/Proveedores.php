<?php 
require_once('../../Conexion.php');

class Proveedores extends Conexion {
    
    public function __construct(){
        $this->db = parent::__construct();
    }

    public function add($Nombre, $Documento, $Correo){
        $statement = $this->db->prepare("INSERT INTO proveedores (NOMBRE, DOCUMENTO, CORREO, 
        ESTADO) VALUES (:Nombre, :Documento, :Correo, 'Activo')");
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Documento', $Documento);
        $statement->bindParam(':Correo', $Correo);
        if($statement->execute()){
            header('Location: ../Pages/index.php');//EN CASO DE QUE SEA EXITOSA LA INSERCIÓN NOS DIRIGIMOS AL INDEX PRINCIPAL
        }else{
            header('Location: ../Pages/add.php');//EN CASO DE QUE SEA INCORRECTA LA INSERCIÓN NOS DIRIGIMOS A LA PAGINA DE ADD
        }
    }
    //METODO PARA LISTAR TODA LA INFORMACIÓN DE LOS PROVEEDORES
    public function get(){
        //$rows == null; //Entonces nos traera un arreglo que contendra todos los registros que estan en nuestra base de datos 
        $statement = $this->db->prepare("SELECT * FROM proveedores");
        $statement->execute();
        while($result = $statement-> fetch()){//SIEMPRE Y CUANDO HAYAN RESULTADOS EN NUESTRA VARIABLE $RESULT
            $rows[] = $result; //SI OBTUVIMOS 5 REGISTROS ESTOS VAN A SER GUARDADOS DENTRO DE NUESTRO ARREGLO ROWS[] ASIGNANDOLO A LA VARIABLE $RESULT PARA MOSTRARLO
        
        }
        return $rows;
    }
    //METODO PARA LISTAR LA INFORMACIÓN DE UN SOLO PROVEEDOR POR ID
    public function getById($Id){
        //$rows == null; //Entonces nos traera un arreglo que contendra todos los registros que estan en nuestra base de datos 
        $statement = $this->db->prepare("SELECT * FROM proveedores WHERE ID_PROVEEDOR = :Id");
        $statement->bindParam(':Id', $Id); //EL ID QUE TENGO DECLADO LE VOY A PASAR EL ID QUE TENGO COMO PARAMETRO
        $statement->execute();
        while($result = $statement-> fetch()){//SIEMPRE Y CUANDO HAYAN RESULTADOS EN NUESTRA VARIABLE $RESULT
            $rows[] = $result; //SI OBTUVIMOS 5 REGISTROS ESTOS VAN A SER GUARDADOS DENTRO DE NUESTRO ARREGLO ROWS[] ASIGNANDOLO A LA VARIABLE $RESULT PARA MOSTRARLO
        
        }
        return $rows;
    }
    //METODO PARA ACTUALIZAR UN PROVEEDOR
    public function update($Id, $Nombre, $Documento, $Correo, $Estado){
        $statement = $this->db->prepare("UPDATE proveedores SET NOMBRE = :Nombre, DOCUMENTO = :Documento, CORREO = :Correo, ESTADO = :Estado WHERE ID_PROVEEDOR = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Documento', $Documento);
        $statement->bindParam(':Correo', $Correo);
        $statement->bindParam(':Estado', $Estado);
        if($statement->execute()){
            header('Location: ../Pages/index.php');//EN CASO DE QUE SEA EXITOSA LA ACTUALIZACION NOS DIRIGIMOS AL INDEX PRINCIPAL
        }else{
            header('Location: ../Pages/edit.php');//EN CASO DE QUE SEA INCORRECTA LA ACTUALIZACION NOS DIRIGIMOS A LA PAGINA DE ADD
        }

    }
    //METODO PARA ELIMINAR UN PROVEEDOR
    public function delete($Id){
        $statement = $this->db->prepare("DELETE FROM proveedores WHERE ID_PROVEEDOR = :Id");
        $statement->bindParam(':Id', $Id);
        if($statement->execute()){
            header('Location: ../Pages/index.php');//EN CASO DE QUE SEA EXITOSA LA ELIMINACIÓN NOS DIRIGIMOS AL INDEX PRINCIPAL
        }else{
            header('Location: ../Pages/delete.php');//EN CASO DE QUE SEA INCORRECTA LA ELIMINACIÓN NOS DIRIGIMOS A LA PAGINA DE ADD
        }
    }


}


?>