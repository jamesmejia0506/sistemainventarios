<?php

require_once('../Modelo/Proveedores.php');

if($_POST) {//LO PRIMERO QUE HAY QUE HACER SIEMPRE ES VALIDAR SI TENEMOS UNA PETICIÓN POST PARA SEGUIR CON EL RESTO
$ModeloProveedores = new Proveedores(); //creamos un objeto del modelo de Proveedores
$Id = $_POST['Id']; //SE RECIBE EN EL FORMULARIO CON GET Y LO MANDAMOS CON POST A ESTE CONTROLADOR

$ModeloProveedores->delete($Id); //por medio del objeto accedemos al metodo delete
}else{
    header('Location: ../../index.php');
}



?>