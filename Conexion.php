<?php

class Conexion{

    protected $db;
    private $driver = "mysql";
    private $host = "localhost";
    private $bd = "inventarios";
    private $usuario = "root";
    private $contrasena = "";

    public function __construct(){
        try{//el this significa que estamos trabajando sobre el objeto actual que tenemos en nuestra clase
            $db = new PDO("{$this->driver}:host={$this->host};dbname={$this->bd}", $this->usuario, $this->contrasena);//atributo que retornaremos cada vez que hagamos un llamado a nuestro constructor
        //objeto creado de la clase pdo
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Se le asignan 2 atributos para manejar los errores en este caso con el try catch
        return $db; 
    }catch (PDOException $e){
        echo "Ha surgido un error al tratar de conectarse a la base de datos" .$e->getMessage();
        }
    }
}

?>