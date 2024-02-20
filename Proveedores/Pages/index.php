<?php

require_once('../../Usuarios/Modelo/Usuarios.php'); //Realizamos la importacion del modelo de usuarios
require_once('../Modelo/Proveedores.php');
$ModeloUsuarios = new Usuarios();//ya con este objeto puedo hacer uso de los metodos de la clase usuarios
$ModeloUsuarios->validarSessionAdministrador();

$Modelo = new Proveedores();

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
    <br>
    
    <h1 class="botones-container">
    <a href="add.php" class="boton">Registrar proveedor</a><br>
    <a href="../../Administradores/Pages/index.php" class="boton">Administradores</a> <br>
    <a href="../../Inventaristas/Pages/index.php" class="boton">Inventaristas</a> <br>
    <a href="../../Articulos/Pages/index.php" class="boton">Articulos</a> <br>
    <a href="#" class="boton select">Proveedores</a> <br>
    
</h1>
<br>
<hr class="linea">
<div class="container">
    < <table class="tablas">
    <h4 class="contenedor-inputs titulo_listado">Listado de proveedores</h4> <br>
    <thead>
    <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Documento</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <?php
        
        $Proveedores = $Modelo->get();
        if($Proveedores != null){
            foreach($Proveedores as $Proveedor){


        
        ?>
        <tbody>
        <tr>

        <td data-label="Id"><?php echo $Proveedor['ID_PROVEEDOR']?></td>
        <td data-label="Nombre"><?php echo $Proveedor['NOMBRE']?></td>
        <td data-label="Documento"><?php echo $Proveedor['DOCUMENTO']?></td>
        <td data-label="Correo"><?php echo $Proveedor['CORREO']?></td>
        <td data-label="Estado"><?php echo $Proveedor['ESTADO']?></td>
            <td data-label="Acciones">
            <a class="tablas columnas boton_acciones" href="edit.php?Id=<?php echo $Proveedor['ID_PROVEEDOR']?>">Editar</a> 
                /
            <a class="tablas columnas boton_acciones" href="delete.php?Id=<?php echo $Proveedor['ID_PROVEEDOR']; ?>&Nombre=<?php echo $Proveedor['NOMBRE']; ?>&Documento=<?php echo $Proveedor['DOCUMENTO']; ?>">Eliminar</a>
                
            </td>
        </tr>
        </tbody>
        <?php
          }
        }
        ?>
    </table>
    </div>
    </div>
</body>
</html>