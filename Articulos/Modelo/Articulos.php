<?php 
require_once('../../Conexion.php');

class Articulos extends Conexion {
    
    public function __construct(){
        $this->db = parent::__construct();
    }

    public function add($Nombre, $Codigo, $Cantidad, $PrecioUnidad, $TotalUnidades, $Descripcion, $Proveedor, $Fecha){
        $TotalUnidades = $PrecioUnidad * $Cantidad;
        $statement = $this->db->prepare("INSERT INTO articulos (NOMBRE, CODIGO, CANTIDAD, 
        PRECIO_UNIDAD, TOTAL_UNIDADES, DESCRIPCION, PROVEEDOR, FECHA_REGISTRO) VALUES (:Nombre, :Codigo, :Cantidad, :PrecioUnidad, :TotalUnidades, :Descripcion, :Proveedor, :Fecha)");
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Codigo', $Codigo);
        $statement->bindParam(':Cantidad', $Cantidad);
        $statement->bindParam(':PrecioUnidad', $PrecioUnidad);
        $statement->bindParam(':TotalUnidades', $TotalUnidades);
        $statement->bindParam(':Descripcion', $Descripcion);
        $statement->bindParam(':Proveedor', $Proveedor);
        $statement->bindParam(':Fecha', $Fecha);
        if($statement->execute()){
            header('Location: ../Pages/index.php');//EN CASO DE QUE SEA EXITOSA LA INSERCIÓN NOS DIRIGIMOS AL INDEX PRINCIPAL
        }else{
            header('Location: ../Pages/add.php');//EN CASO DE QUE SEA INCORRECTA LA INSERCIÓN NOS DIRIGIMOS A LA PAGINA DE ADD
        }
    }
    //METODO PARA LISTAR TODA LA INFORMACIÓN DE LOS ARTICULOS
    public function get(){
        //$rows == null; //Entonces nos traera un arreglo que contendra todos los registros que estan en nuestra base de datos 
        $statement = $this->db->prepare("SELECT * FROM articulos");
        $statement->execute();
        while($result = $statement-> fetch()){//SIEMPRE Y CUANDO HAYAN RESULTADOS EN NUESTRA VARIABLE $RESULT
            $rows[] = $result; //SI OBTUVIMOS 5 REGISTROS ESTOS VAN A SER GUARDADOS DENTRO DE NUESTRO ARREGLO ROWS[] ASIGNANDOLO A LA VARIABLE $RESULT PARA MOSTRARLO
        
        }
        return $rows;
    }
    //METODO PARA LISTAR LA INFORMACIÓN DE UN SOLO ARTICULO POR ID
    public function getById($Id){
        //$rows == null; //Entonces nos traera un arreglo que contendra todos los registros que estan en nuestra base de datos 
        $statement = $this->db->prepare("SELECT ID_ARTICULO, NOMBRE, CODIGO, CANTIDAD, 
        PRECIO_UNIDAD, DESCRIPCION, PROVEEDOR, FECHA_REGISTRO FROM articulos WHERE ID_ARTICULO = :Id");
        $statement->bindParam(':Id', $Id); //EL ID QUE TENGO DECLADO LE VOY A PASAR EL ID QUE TENGO COMO PARAMETRO
        $statement->execute();
        while($result = $statement-> fetch()){//SIEMPRE Y CUANDO HAYAN RESULTADOS EN NUESTRA VARIABLE $RESULT
            $rows[] = $result; //SI OBTUVIMOS 5 REGISTROS ESTOS VAN A SER GUARDADOS DENTRO DE NUESTRO ARREGLO ROWS[] ASIGNANDOLO A LA VARIABLE $RESULT PARA MOSTRARLO
        
        }
        return $rows;
    }
    
    //METODO PARA ACTUALIZAR UN ARTICULO
    public function update($Id, $Nombre, $Codigo, $Cantidad, $PrecioUnidad, $TotalUnidades, $Descripcion, $Proveedor, $Fecha){
       $TotalUnidades = $PrecioUnidad * $Cantidad;
       $statement = $this->db->prepare("UPDATE articulos SET NOMBRE = :Nombre, CODIGO = :Codigo, CANTIDAD = :Cantidad, PRECIO_UNIDAD = :PrecioUnidad, TOTAL_UNIDADES = :TotalUnidades, DESCRIPCION = :Descripcion, 
        PROVEEDOR = :Proveedor, FECHA_REGISTRO = :Fecha WHERE ID_ARTICULO = :Id");
        $statement->bindParam(':Id', $Id);
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Codigo', $Codigo);
        $statement->bindParam(':Cantidad', $Cantidad);
        $statement->bindParam(':PrecioUnidad', $PrecioUnidad);
        $statement->bindParam(':TotalUnidades', $TotalUnidades);
        $statement->bindParam(':Descripcion', $Descripcion);
        $statement->bindParam(':Proveedor', $Proveedor);
        $statement->bindParam(':Fecha', $Fecha);
        if($statement->execute()){
            header('Location: ../Pages/index.php');//EN CASO DE QUE SEA EXITOSA LA ACTUALIZACION NOS DIRIGIMOS AL INDEX PRINCIPAL
        }else{
            header('Location: ../Pages/edit.php');//EN CASO DE QUE SEA INCORRECTA LA ACTUALIZACION NOS DIRIGIMOS A LA PAGINA DE ADD
        }

    }
    //METODO PARA ELIMINAR UN ARTICULO
    public function delete($Id){
        $statement = $this->db->prepare("DELETE FROM articulos WHERE ID_ARTICULO = :Id");
        $statement->bindParam(':Id', $Id);
        if($statement->execute()){
            header('Location: ../Pages/index.php');//EN CASO DE QUE SEA EXITOSA LA ELIMINACIÓN NOS DIRIGIMOS AL INDEX PRINCIPAL
        }else{
            header('Location: ../Pages/delete.php');//EN CASO DE QUE SEA INCORRECTA LA ELIMINACIÓN NOS DIRIGIMOS A LA PAGINA DE ADD
        }
    }
    //METODO PARA BUSCAR LA INFORMACIÓN DE UN SOLO ARTICULO POR ID
    public function search($Search){
        //$rows == null; //Entonces nos traera un arreglo que contendra todos los registros que estan en nuestra base de datos 
        $statement = $this->db->prepare("SELECT ID_ARTICULO, NOMBRE, CODIGO, CANTIDAD, 
        PRECIO_UNIDAD, DESCRIPCION, PROVEEDOR, FECHA_REGISTRO FROM articulos WHERE NOMBRE LIKE concat('%', :Search, '%') OR CODIGO LIKE concat('%', :Search, '%') OR CANTIDAD LIKE concat('%', :Search, '%') 
        OR PRECIO_UNIDAD LIKE concat('%', :Search, '%') OR TOTAL_UNIDADES LIKE concat('%', :Search, '%') OR DESCRIPCION LIKE concat('%', :Search, '%') OR PROVEEDOR LIKE concat('%', :Search, '%')");
        $statement->bindParam(':Search', $Search); //EL ID QUE TENGO DECLADO LE VOY A PASAR EL ID QUE TENGO COMO PARAMETRO
        $statement->execute();
        while($result = $statement-> fetch()){//SIEMPRE Y CUANDO HAYAN RESULTADOS EN NUESTRA VARIABLE $RESULT
            $rows[] = $result; //SI OBTUVIMOS 5 REGISTROS ESTOS VAN A SER GUARDADOS DENTRO DE NUESTRO ARREGLO ROWS[] ASIGNANDOLO A LA VARIABLE $RESULT PARA MOSTRARLO
        
        }
        return $rows;
    }

}


?>