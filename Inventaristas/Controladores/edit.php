<?php

require_once('../Modelo/Inventaristas.php');

if($_POST){
    $ModeloInventaristas = new Inventaristas();
    $Id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Password'];
    $Estado = $_POST['Estado'];
    $ModeloInventaristas->update($Id, $Nombre, $Apellido, $Usuario, $Password, $Estado);
    sleep(2);
}else{
    header('Location: ../../index.php');
}

?>
