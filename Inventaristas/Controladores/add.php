<?php

require_once('../Modelo/Inventaristas.php');

if($_POST){
    $ModeloInventaristas = new Inventaristas();

    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Password'];
    $ModeloInventaristas->add($Nombre, $Apellido, $Usuario, $Password);
    sleep(2);
}else{
    header('Location: ../../index.php');
}



?>