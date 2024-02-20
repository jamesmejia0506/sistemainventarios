<?php

require_once('../../Usuarios/Modelo/Usuarios.php'); //Realizamos la importacion del modelo de usuarios
require_once('../../Metodos.php');

$ModeloUsuarios = new Usuarios();//ya con este objeto puedo hacer uso de los metodos de la clase usuarios
$ModeloUsuarios->validarSession();

$ModeloMetodos = new Metodos();

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
    <a class="boton_encabezado" onclick="volverAtras()"href='#'><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <h2 class="contenedor-inputs titulo_empresa">INVENTARIOS BODEGAS JAMES S.A</h2>
    <div id="miModal" class="modal">
  <div class="modal-content">
    <p>¿Estás seguro de que quieres cerrar la sesión?</p>
    <br>
    <div class="modal-buttons">
      <button onclick="cerrarSesion()">Sí</button>
      <button onclick="cerrarModal()">No</button>
    </div>
  </div>
</div>
<a class="boton_encabezado" href="#" onclick="mostrarModal();"><i class="fa fa-sign-out-alt"></i></a>
    </div>
    <div class="contenedor-inputs titulo_bienvenido">

    <h3> Bienvenido(a): <?php echo $ModeloUsuarios->getNombre(); ?> | Perfil: <?php echo $ModeloUsuarios->getPerfil();?></h3>
    <a class="icon-home" href='../../Articulos/Pages/index.php'></a>
    </div>
    
    <form id="formulario-guardar" class="form-register-inventarios" action="../Controladores/add.php" method="post">
    <h1 class="contenedor-inputs titulo_1">Registrar administrador</h1> <br> <br>
       <p class="input-1">Nombre</p> <br>
        <input class="input-2" type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre"> <br><br>
        <p class="input-1">Apellido</p> <br>
        <input class="input-2" type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido"> <br><br>
        <div id="mensaje-exito" class="mensaje-exito oculto">
            ¡Guardado con éxito!
            </div>
        <p class="input-1">Usuario</p> <br>
        <input class="input-2" type="text" name="Usuario" required="" autocomplete="off" placeholder="Usuario"> <br><br>
        <p class="input-1">Password</p> <br>
        <input class="input-2" type="password" name="Password" required="" autocomplete="off" placeholder="Password"> <br><br>
       

        <input type="submit" value="Guardar" class="contenedor-inputs btn-enviar"> <br>
    </form>
    </div>
</body>
</html>