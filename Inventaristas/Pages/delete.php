<?php

require_once('../../Usuarios/Modelo/Usuarios.php'); //Realizamos la importacion del modelo de usuarios
require_once('../../Metodos.php');

$ModeloUsuarios = new Usuarios();//ya con este objeto puedo hacer uso de los metodos de la clase usuarios
$ModeloUsuarios->validarSession();

$Id = $_GET['Id']; //MANDAMOS EL ID Y LO GUARDAMOS EN LA VARIABLE $Id
$Nombre = $_GET['Nombre'];
$Usuario = $_GET['Usuario'];
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

<div class="form-register-inventarios">

<div id="modal" class="modal">
    <div class="modal-content">
        <p>¿Seguro que deseas eliminar este inventarista?</p>
        <div class="modal-buttons">
            <button onclick="eliminarUsuario()">Sí</button>
            <button onclick="cerrarModal2()">No</button>
        </div>
    </div>
    </div>
<form id="deleteForm" action="../Controladores/delete.php" method="post">
    <input type="hidden" name="Id" value="<?php echo $Id?>">

    <h1 class="contenedor-inputs titulo_1">Eliminar inventarista</h1> <br> <br>
    <br>
    <h3 class="contenedor-inputs modulo-eliminar-usuarios"> Nombre: <?php echo $Nombre; ?> y usuario: <?php echo $Usuario; ?></h3>
    <br> <br>
    <input type="button" value="Eliminar" class="contenedor-inputs btn-enviar" onclick="mostrarModal2()">
</form>
</div>
</div>
</body>
</html>