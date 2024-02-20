<?php

require_once('../../Usuarios/Modelo/Usuarios.php'); //Realizamos la importacion del modelo de usuarios
require_once('../Modelo/Administradores.php');
require_once('../../Metodos.php');

$ModeloUsuarios = new Usuarios();//ya con este objeto puedo hacer uso de los metodos de la clase usuarios
$ModeloUsuarios->validarSession();

$Modelo = new Administradores();
$Id = $_GET['Id']; //Recibimos el id que trigimos por el metodo get y lo guardamos en la variable id

$InformacionAdministrador = $Modelo->getById($Id); //SE CREA UN ARRAY CON TODA LA INFORMACION DEL ESTUDIANTE APARTIR DEL ID PORE MEDIO DEL METODO getById QUE LO LLAMO POR MEDIO DEL OBJETO MODELO ESTUDIANTES


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

    <form id="formulario-guardar" class="form-register-inventarios" action="../Controladores/edit.php" method="post">
    <input type="hidden" name="Id" value="<?php echo $Id;?>">
        <?php
        if($InformacionAdministrador != null){
            foreach ($InformacionAdministrador as $Informacion){

        
        ?>
        <h1 class="contenedor-inputs titulo_1">Editar Administrador</h1> <br> <br>
        <p class="input-1">Nombre</p> <br>
        <input class="input-2"type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre" value="<?php echo $Informacion['NOMBRE'] ?>"> <br><br>
        <p class="input-1">Apellido</p> <br>
        <input class="input-2" type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido" value="<?php echo $Informacion['APELLIDO'] ?>"> <br><br>
        <p class="input-1">Usuario</p> <br>
        <div id="mensaje-exito" class="mensaje-exito oculto">
            ¡Guardado con éxito!
            </div>
        <input class="input-2" type="text" name="Usuario" required="" autocomplete="off" placeholder="Usuario" value="<?php echo $Informacion['USUARIO'] ?>"> <br><br>
        <p class="input-1">Password</p> <br>
        <input class="input-2" type="password" name="Password" required="" autocomplete="off" placeholder="Password" value="<?php echo $Informacion['PASSWORD'] ?>"> <br><br>
        <p class="input-1">Estado</p> <br>
        <select class="input-2" name="Estado" required="">
            <option class="input-2" value="<?php echo $Informacion['ESTADO'] ?>"><?php echo $Informacion['ESTADO']?></option>
            <option class="input-2" value="Activo">Activo</option>
            <option class="input-2" value="Inactivo">Inactivo</option>
        </select> <br><br>
        <?php
    
            }
        }
        
    ?>
<br><br>
        <input type="submit" value="Guardar" class="contenedor-inputs btn-enviar"> <br>
        </form>


</div>

</body>
</html>