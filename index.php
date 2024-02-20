<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de inventario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="Estilos/styles.css">
</head>
<body class="login-page">

    <form class="form-register" action="Usuarios/Controladores/Login.php" method="POST">

    <h1 class="contenedor-inputs titulo_1">Inicio de sesión</h1> <br> <br>
        
        <p class="input-1">Usuario</p> <br>
        
        <input class="input-login-icon-user" type="text" name="Usuario" required="" autocomplete="off" > 
        
        <p class="input-1">Contraseña</p> <br>
        <input class="input-login-icon-password" type="password" name="Contrasena" required="" autocomplete="off"> <br> <br>
        <p class="form__link">¿No tienes una cuenta? <b><a class="ingresaAqui"href="Usuarios/Pages/addUsuario.php">Ingresa aquí</a></p></b> <br> <br>
        <input type="submit" value="Ingresar" class="contenedor-inputs btn-enviar"><br><br>
    </div>
    </form>
    
</body>
</html>