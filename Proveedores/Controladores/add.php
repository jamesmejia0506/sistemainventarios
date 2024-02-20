<?php

require_once('../Modelo/Proveedores.php');

if($_POST){
    $ModeloProveedores = new Proveedores();
    $Nombre = $_POST['Nombre'];
    $Documento = $_POST['Documento'];
    $Correo = $_POST['Correo'];
    $Estado = $_POST['Estado'];
    $ModeloProveedores->add($Nombre, $Documento, $Correo);
    sleep(2);
}else{
    header('Location: ../../index.php');
}



?>