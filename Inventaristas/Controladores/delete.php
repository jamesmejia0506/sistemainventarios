<?php

require_once('../Modelo/Inventaristas.php');

if($_POST) {//LO PRIMERO QUE HAY QUE HACER SIEMPRE ES VALIDAR SI TENEMOS UNA PETICIÓN POST PARA SEGUIR CON EL RESTO
$ModeloInventaristas = new Inventaristas(); //creamos un objeto del modelo de Inventarista
$Id = $_POST['Id']; //SE RECIBE EN EL FORMULARIO CON GET Y LO MANDAMOS CON POST A ESTE CONTROLADOR
$Nombre = $_POST['Nombre'];   
$ModeloInventaristas->delete($Id); //por medio del objeto accedemos al metodo delete
}else{
    header('Location: ../../index.php');
}



?>