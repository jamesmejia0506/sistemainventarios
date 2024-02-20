<?php

require_once('../Modelo/Proveedores.php');

if($_POST){
    $Modelo = new Proveedores();
    $Id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $Documento = $_POST['Documento'];
    $Correo = $_POST['Correo'];
    $Estado = $_POST['Estado'];
    $Modelo->update($Id, $Nombre, $Documento, $Correo, $Estado);
    sleep(2);
}else{
    header('Location: ../../index.php');
}



?>