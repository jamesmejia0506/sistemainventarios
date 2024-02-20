<?php

require_once('../Modelo/Articulos.php');

if($_POST) {//LO PRIMERO QUE HAY QUE HACER SIEMPRE ES VALIDAR SI TENEMOS UNA PETICIÓN POST PARA SEGUIR CON EL RESTO
$ModeloArticulo = new Articulos(); //creamos un objeto del modelo de estudiantes
$Id = $_POST['Id']; //SE RECIBE EN EL FORMULARIO CON GET Y LO MANDAMOS CON POST A ESTE CONTROLADOR
   
$ModeloArticulo->delete($Id); //por medio del objeto accedemos al metodo delete
}else{
    header('Location: ../../index.php');
}



?>