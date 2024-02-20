<?php

require_once('../Modelo/Administradores.php');

if($_POST){
    $ModeloAdministrador = new Administradores();
    $Id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Password'];
    $Estado = $_POST['Estado'];
    $ModeloAdministrador->update($Id, $Nombre, $Apellido, $Usuario, $Password, $Estado);
    sleep(2);
}else{
    header('Location: ../../index.php');
}



?>