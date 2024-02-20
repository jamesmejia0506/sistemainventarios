<?php

require_once('../Modelo/Usuarios.php'); //Realizamos la importacion del modelo de usuarios
require_once('../../Metodos.php');

$ModeloUsuarios = new Usuarios();//ya con este objeto puedo hacer uso de los metodos de la clase usuarios


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de inventario</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Estilos/styles.css">
    <script src="../../scripts/scripts.js" type="text/javascript"></script>
</head>
<body class="page-inventario">
<div class="contenedor-tablas-inventarios">
<div class="boton_contenedor_encabezado_page">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="boton_encabezado" onclick="volverAtras()"href='#'><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
<div id="miModal" class="modal">
<div class="modal-content">
<div class="modal-buttons">
</div>
</div>

</div>

    <form class="form-register-inventarios" action="../Controladores/RegistrarUsuario.php" method="post">
   
    <h1 class="contenedor-inputs titulo_1">Registrar usuario</h1> <br> <br>
        <p class="input-1">Nombre</p> <br>
        <input class="input-2" type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre"> <br><br>
        <p class="input-1">Apellido</p> <br>
        <input class="input-2" type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido"> <br><br>
        <p class="input-1">Usuario</p> <br>
        <input class="input-2" type="text" name="Usuario" required="" autocomplete="off" placeholder="Usuario"> <br><br>
        <p class="input-1">Password</p> <br>
        <input class="input-2" type="password" name="Password" required="" autocomplete="off" placeholder="Password"> <br><br>
        <p class="input-1">Perfil</p> <br>
        <select class="input-2" name="Perfil" required="">
            <!--<option value="Administrador">Administrador</option>-->
            <option value="Inventarista">Inventarista</option>
        </select> <br> <br>
        <input type="submit" value="Guardar" class="contenedor-inputs btn-enviar"> <br>
    </form> 

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</body>
</html>

