<?php

require_once('../Modelo/Usuarios.php');

if($_POST){ //verificamos que se haga una petición post, al momento de dar clic en el boton de enviar para que me dirija a esta ruta
    echo $Usuario = $_POST['Usuario']; //CUANDO LOS DATOS SE MANDAN POR EL METODO POST SE RECIBEN CON ESTE MISMO
    echo (" ");
    echo $Password = $_POST['Contrasena'];

    $Modelo = new Usuarios();//SE CREA UN OBJETO DE LA CLASE USUARIOS, para acceder al método Login
    if($Modelo->login($Usuario, $Password)){ //Van en este metodo login
        header('Location: ../../Articulos/Pages/index.php');
    }else{
        header('Location: ../../index.php');
    }
}else{
    header('Location: ../../index.php'); //en caso de que al mandar los datos estos no lleguen por el metodo post realizamos esta accion de mandar a la pagina index.php
}


?>
