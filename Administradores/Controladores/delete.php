<?php

require_once('../Modelo/Administradores.php');

if($_POST) {//LO PRIMERO QUE HAY QUE HACER SIEMPRE ES VALIDAR SI TENEMOS UNA PETICIÓN POST PARA SEGUIR CON EL RESTO
$ModeloAdministrador = new Administradores(); //creamos un objeto del modelo de administradores
$Id = $_POST['Id']; //SE RECIBE EN EL FORMULARIO CON GET Y LO MANDAMOS CON POST A ESTE CONTROLADOR
   
$ModeloAdministrador->delete($Id); //por medio del objeto accedemos al metodo delete
}else{
    header('Location: ../../index.php');
}



?>