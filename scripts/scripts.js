console.log("¡El script se ha cargado correctamente!");
///cerrar sesion 
function mostrarModal() {
  // Muestra la ventana modal
  document.getElementById('miModal').style.display = 'flex';
}

function cerrarModal() {
  // Cierra la ventana modal
  document.getElementById('miModal').style.display = 'none';
}

function cerrarSesion() {
  // Redirige a la página de cierre de sesión
  window.location.href = '../../Usuarios/Controladores/Salir.php';
}

////confirmación de eliminar un usuario
function volverAtras() {
    window.history.back();
}

function mostrarModal2() {
    document.getElementById('modal').style.display = 'flex';
}

function cerrarModal2() {
    document.getElementById('modal').style.display = 'none';
}

function eliminarUsuario() {
    document.getElementById('deleteForm').submit();
}

//////mensaje de guardado exitosamente
document.addEventListener('DOMContentLoaded', function () {
    var mensajeExito = document.getElementById('mensaje-exito');

    document.getElementById('formulario-guardar').addEventListener('submit', function (event) {


      // Mostrar el mensaje de éxito
      mensajeExito.style.display = 'block';

      // Ocultar el mensaje después de 3 segundos
      setTimeout(function () {
        mensajeExito.style.display = 'none';
      }, 2000);
    });
  });

