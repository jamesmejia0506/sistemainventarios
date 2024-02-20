<?php

require_once('../Modelo/Articulos.php');

if($_POST){
    $ModeloArticulos = new Articulos();

    $Nombre = $_POST['Nombre'];
    $Codigo = $_POST['Codigo'];
    $Cantidad = $_POST['Cantidad'];
    $PrecioUnidad = $_POST['PrecioUnidad'];
    $TotalUnidades = $_POST['TotalUnidades'];
    $Descripcion = $_POST['Descripcion'];
    $Proveedor = $_POST['Proveedor'];
    $Fecha = date('y-m-d');
    $ModeloArticulos->add($Nombre, $Codigo, $Cantidad, $PrecioUnidad, $TotalUnidades, $Descripcion, $Proveedor, $Fecha);
    sleep(2);
}else{
    header('Location: ../../index.php');
}



?>