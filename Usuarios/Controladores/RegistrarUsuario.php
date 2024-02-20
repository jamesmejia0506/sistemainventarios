<?php
require_once('../Modelo/Usuarios.php');

$mensajeExitoRegistro = ''; 
$mensajeError = ''; // Inicializar el mensaje de error como una cadena vacía
if ($_POST) {
    $ModeloRegistroUsuario = new Usuarios();
    
    // Obtener datos del formulario
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Usuario = $_POST['Usuario'];
    $Password = $_POST['Password'];
    $Perfil = $_POST['Perfil'];

    if ($ModeloRegistroUsuario->UsuarioExistente($Usuario)) {
        header('Location: ../Pages/errorRegistro.php');
    } else {
        // Intentar registrar al usuario
        if ($ModeloRegistroUsuario->RegistrarUsuario($Nombre, $Apellido, $Usuario, $Password, $Perfil)) {
            // Registro exitoso
            header('Location: ../Pages/registroExitoso.php');
            exit();
        } else {
            // Error en el registro, asignar un mensaje de error
            $mensajeError = 'Hubo un problema al intentar registrar el usuario. Por favor, inténtalo de nuevo.';
        }
    }
    
            
}else {
    // Redirigir a la página de inicio si no se enviaron datos por POST
    header('Location: ../../index.php');
    exit();
}
?>



