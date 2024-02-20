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
       <h1 class="contenedor-inputs titulo_1">Registrar articulo</h1> <br> <br>
       <p class="input-1">Nombre</p> <br>
        <input class="input-2" type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre"> <br><br>
        <p class="input-1">Codigo</p> <br>
        <input class="input-2" type="text" name="Codigo" required="" autocomplete="off" placeholder="Codigo"> <br><br>
        <p class="input-1">Cantidad</p> <br>
        <input class="input-2" type="number" name="Cantidad" required="" autocomplete="off" placeholder="Cantidad"> <br><br>
        <p class="input-1">Precio unidad</p> <br>
        <div id="mensaje-exito" class="mensaje-exito oculto">
            ¡Guardado con éxito!
            </div>
        <input class="input-2" type="number" name="PrecioUnidad" required="" autocomplete="off" placeholder="Precio unidad">
        <input class="input-2" type="hidden" name="TotalUnidades" readonly autocomplete="off" placeholder="Total Unidades"> <br><br>
        <p class="input-1">Descripcion</p> <br>
        <input class="input-2"type="text" name="Descripcion" required="" autocomplete="off" placeholder="Descripcion"> <br><br>
        <p class="input-1">Proveedor</p> <br>
        <select class="input-2" name="Proveedor" required="">
            
            <?php
        //ME VA A RETORNAR UN ARREGLO CON TODOS LOS PROVEEDORES QUE ENCUENTRE EN LA BASE DE DATOS
        $Proveedores = $ModeloMetodos->getProveedores(); /** CREAMOS UNA VARIABLE $PROVEEDORES QUE ES LA QUE NOS VA ALMACENAR LA INFORMACIÓN QUE ESTA EN NUESTRA BASE DE DATOS**/
        if($Proveedores != null){ //VERIFICAMOS QUE EXISTAN DATOS DENTRO DE LA TABLA
            //RECORREMOS ESOS DATOS CON EL CICLO FOREACH QUE ES EL QUE SE USA PARA LOS ARREGLOS
            foreach ($Proveedores as $Proveedor){ //En Proveedores contengo todos los Proveedores y en Proveedor uno solo

            
        ?>
        <option value="<?php echo $Proveedor['NOMBRE']; ?>"><?php echo $Proveedor['NOMBRE'];?></option>
        <?php
       
            }
        }
        ?>
        </select> <br><br>

<br>
        <input type="submit" value="Guardar" class="contenedor-inputs btn-enviar"> <br>
    </form>
    </div>
</body>
</html>