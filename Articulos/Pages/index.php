<?php

require_once('../../Usuarios/Modelo/Usuarios.php'); //Realizamos la importacion del modelo de usuarios
require_once('../Modelo/Articulos.php');
$ModeloUsuarios = new Usuarios();//ya con este objeto puedo hacer uso de los metodos de la clase usuarios
$ModeloUsuarios->validarSession();

$ModeloArticulos = new Articulos();

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

    <?php
    if($ModeloUsuarios->getPerfil() == 'Inventarista'){
        
    ?>
    <div class="contenedor-inputs titulo_bienvenido">
    
        <h3> Bienvenido(a): <?php echo $ModeloUsuarios->getNombre(); ?> | Perfil: <?php echo $ModeloUsuarios->getPerfil();?></h3>
        <a class="icon-home" href='../../Articulos/Pages/index.php'></a>
    </div>
    <?php
    }else{
    ?>
    <div class="contenedor-inputs titulo_bienvenido">
        <h3> Bienvenido(a): <?php echo $ModeloUsuarios->getNombre(); ?> | Perfil: <?php echo $ModeloUsuarios->getPerfil();?></h3>
        <a class="icon-home" href='../../Articulos/Pages/index.php'></a>
    </div>
    <br>
    <h1 class="botones-container">
        <a href="add.php" class="boton">Registrar articulo</a><br> <br>
        <a href="../../Administradores/Pages/index.php" class="boton">Administradores</a><br>
        <a href="../../Inventaristas/Pages/index.php" class="boton">Inventaristas</a><br>
        <a href="#" class="boton select">Articulos</a><br>
        <a href="../../Proveedores/Pages/index.php" class="boton">Proveedores</a>
    
    </h1> 
    <?php
    }
    ?>
    <br>
    <hr class="linea">
    <div class="container">
    <table class="tablas">
    <h4 class="contenedor-inputs titulo_listado">Listado de articulos</h4> <br>
    <thead>
    <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Cantidad</th>
            <th>Precio unidad</th>
            <th>Total unidades</th>
            <th>Descripción</th>
            <th>Proveedor</th>
            <th>Fecha de registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    
        <?php
        //ME VA A RETORNAR UN ARREGLO CON TODOS LOS ARTICULOS QUE ENCUENTRE EN LA BASE DE DATOS
        $Articulos = $ModeloArticulos->get(); /** CREAMOS UNA VARIABLE $ARTICULOS QUE ES LA QUE NOS VA ALMACENAR LA INFORMACIÓN QUE ESTA EN NUESTRA BASE DE DATOS**/
        if($Articulos != null){ //VERIFICAMOS QUE EXISTAN DATOS DENTRO DE LA TABLA
            //RECORREMOS ESOS DATOS CON EL CICLO FOREACH QUE ES EL QUE SE USA PARA LOS ARREGLOS
            foreach ($Articulos as $Articulo){ //En Articulos contengo todos los Articulos y en Articulo uno solo

            //Le estamos diciendo que vamos a crear una variable llamada Id y que la vamos a mandar por el metodo get
        
        ?>
        <tbody>
        <tr>
            <td data-label="Id"><?php echo $Articulo['ID_ARTICULO']?></td>
            <td data-label="Nombre"><?php echo $Articulo['NOMBRE']?></td>
            <td data-label="Codigo"><?php echo $Articulo['CODIGO']?></td>
            <td data-label="Cantidad"><?php echo $Articulo['CANTIDAD']?></td>
            <td data-label="Precio unidad"><?php echo $Articulo['PRECIO_UNIDAD']?>$</td>
            <td data-label="Total unidades"><?php echo $Articulo['TOTAL_UNIDADES']?>$</td>
            <td data-label="Descripción"><?php echo $Articulo['DESCRIPCION']?></td>
            <td data-label="Proveedor"><?php echo $Articulo['PROVEEDOR']?></td>
            <td data-label="Fecha de registro"><?php echo $Articulo['FECHA_REGISTRO']?></td>
            
            <td data-label="Acciones">
                <a class="tablas columnas boton_acciones" href="edit.php?Id=<?php echo $Articulo['ID_ARTICULO']?>">Editar</a> 
                /
                <a class="tablas columnas boton_acciones" href="delete.php?Id=<?php echo $Articulo['ID_ARTICULO']; ?>&Nombre=<?php echo $Articulo['NOMBRE']; ?>&Codigo=<?php echo $Articulo['CODIGO']; ?>">Eliminar</a>
                
            </td>
        </tr>
        </tbody>
        <?php
                }
            }
        ?>
    </table>
    
    <br>
   <!--<h1 class="botones-container"><a href='#' class="boton">Descargar</a>-->
    
    </div>
    </div>
</body>
</html>