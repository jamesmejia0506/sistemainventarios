<?php

require_once('../../Usuarios/Modelo/Usuarios.php'); //Realizamos la importacion del modelo de usuarios
require_once('../Modelo/Inventaristas.php');
$ModeloUsuarios = new Usuarios();//ya con este objeto puedo hacer uso de los metodos de la clase usuarios
$ModeloUsuarios->validarSessionAdministrador();

$ModeloInventaristas = new Inventaristas();


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
<a href="add.php" class="boton">Registrar inventarista</a><br>
<a href="../../Administradores/Pages/index.php" class="boton">Administradores</a> <br>
<a href="#" class="boton select">Inventaristas</a> <br>
<a href="../../Articulos/Pages/index.php" class="boton">Articulos</a> <br>
<a href="../../Proveedores/Pages/index.php" class="boton">Proveedores</a> <br>

</h1>
<br>
<hr class="linea">
<div class="container">
    <table class="tablas">
    <h4 class="contenedor-inputs titulo_listado">Listado de inventaristas</h4> <br>
    <thead>
    <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Perfil</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <?php
        //ME VA A RETORNAR UN ARREGLO CON TODOS LOS INVENTARISTAS QUE ENCUENTRE EN LA BASE DE DATOS
        $Inventaristas = $ModeloInventaristas->get(); /** CREAMOS UNA VARIABLE $Inventaristas QUE ES LA QUE NOS VA ALMACENAR LA INFORMACIÓN QUE ESTA EN NUESTRA BASE DE DATOS**/
        if($Inventaristas != null){ //VERIFICAMOS QUE EXISTAN DATOS DENTRO DE LA TABLA
            //RECORREMOS ESOS DATOS CON EL CICLO FOREACH QUE ES EL QUE SE USA PARA LOS ARREGLOS
            foreach ($Inventaristas as $Inventarista){ //En estudiantes contengo todos los estudiantes y en estudiante uno solo

            //Le estamos diciendo que vamos a crear una variable llamada Id y que la vamos a mandar por el metodo get
        
        ?>
        <tbody>
        <tr>
            <td data-label="Id"><?php echo $Inventarista['ID_USUARIO']?></td>
            <td data-label="Nombre"><?php echo $Inventarista['NOMBRE']?></td>
            <td data-label="Apellido"><?php echo $Inventarista['APELLIDO']?></td>
            <td data-label="Usuario"><?php echo $Inventarista['USUARIO']?></td>
            <td data-label="Perfil"><?php echo $Inventarista['PERFIL']?></td>
            <td data-label="Estado"><?php echo $Inventarista['ESTADO']?></td>
            
            <td data-label="Acciones">
                <a class="tablas columnas boton_acciones" href="edit.php?Id=<?php echo $Inventarista['ID_USUARIO']?>">Editar</a> 
                /
                <a class="tablas columnas boton_acciones" href="delete.php?Id=<?php echo $Inventarista['ID_USUARIO']; ?>&Nombre=<?php echo $Inventarista['NOMBRE']; ?>&Usuario=<?php echo $Inventarista['USUARIO']; ?>">Eliminar</a>

    
            </td>
        </tr>
        </tbody>
        <?php
                }
            }
        ?>
    </table>
    <br>
    <br>
    </div>
    </div>
</body>
</html>