<?php 

require_once('../../Conexion.php');

session_start(); //significa que en este ambito se va a crear una sesión
class Usuarios extends Conexion{
    
    public function __construct(){
       // estamos diciendo en esta linea que el padre osea en este caso Conexion, llamamos al constructor de la clase 
        $this -> db = parent::__construct();//Se usa para guardar el resultado que arroge en la consulta a la bd del constructor de conexion
    }
    public function login($Usuario, $Password){
        $statement = $this->db->prepare("SELECT * FROM usuarios WHERE USUARIO = :Usuario AND PASSWORD = :Password"); //que me deje ingresar siempre y cuando usuario sea igual al usuario que tengo como parametro y la password sea igual a la password que estamos recibiendo como parametro
        $statement->bindParam(':Usuario', $Usuario); //Estoy diciendo que el usuario que estoy recibiendo en los parametros me lo almacene en la varible Usuario ASIGNACIÓN
        $statement->bindParam(':Password', $Password); //Estoy diciendo que el Password que estoy recibiendo en los parametros me lo almacene en la varible Password
        $statement->execute(); //PARA EJECUTAR LA SENTENCIA
        if($statement->rowCount()==1){ //El rowCount sirve para mirar si en la sentencia de sql se encontro un usuario
            //LA VARIABLE $RESULT es un arreglo que ya contiene toda la informacion de los datos registrados
            $result = $statement->fetch(); //sirve para que me traiga los valores que encontró en la base de datos con ese registro
            //SE CUENTAN LOS DATOS PRIMERO CON EL ROWSCOUNT, LUEGO CON EL FETCH SE MUESTRAN LOS DATOS QUE CONTIENEN
            $_SESSION ['NOMBRE'] = $result["NOMBRE"] . " ". $result['APELLIDO']; //Es una variable global similar al post, get etc...
            $_SESSION ['ID'] = $result['ID_USUARIO'];
            $_SESSION ['PERFIL'] = $result['PERFIL'];
            return true; //PARA EL CASO DE QUE EL LOGIN SEA CORRECTO O INCORRECTO PARA DONDE REDIRIGIMOS A LA PERSONA
        }
        return false;
    }

    //METODO PARA REGISTRAR UN NUEVO USUARIO DESDE EL LOGIN
    public function RegistrarUsuario($Nombre, $Apellido, $Usuario, $Password, $Perfil){
        $statement = $this->db->prepare("INSERT INTO usuarios (NOMBRE, APELLIDO, USUARIO, 
        PASSWORD, PERFIL, ESTADO) VALUES (:Nombre, :Apellido, :Usuario, :Password, :Perfil, 'Activo')");
        $statement->bindParam(':Nombre', $Nombre);
        $statement->bindParam(':Apellido', $Apellido);
        $statement->bindParam(':Usuario', $Usuario);
        $statement->bindParam(':Password', $Password);
        $statement->bindParam(':Perfil', $Perfil);
        if($statement->execute()){
            header('Location: ../Pages/registroExitoso.php');//EN CASO DE QUE SEA EXITOSA LA INSERCIÓN NOS DIRIGIMOS AL INDEX PRINCIPAL
        }else{
            header('Location: ../Pages/add.php');//EN CASO DE QUE SEA INCORRECTA LA INSERCIÓN NOS DIRIGIMOS A LA PAGINA DE ADD
        }
    }

// METODO PARA VERIFICAR CUANDO UN USUARIO ESTÁ EN LA BASE DE DATOS
public function UsuarioExistente($Usuario) {
    $statement = $this->db->prepare("SELECT COUNT(*) FROM usuarios WHERE USUARIO = :Usuario");
    $statement->bindParam(':Usuario', $Usuario);
    $statement->execute();

    $conteo = $statement->fetchColumn();

    return ($conteo > 0);
}
    
    //ESTOS MÉTODOS DECLARADOS YA PODEMOS HACER LLAMADO DE INICIO DE SESION EN CUALQUIER PARTE DEL PROGRAMA
    public function getNombre(){
        return $_SESSION['NOMBRE']; //retornará el valor que fue asignado en la instruccion de $_SESSION ['NOMBRE']
    }
    public function getId(){
        return $_SESSION['ID']; //retornará el valor que fue asignado en la instruccion de $_SESSION ['ID']
    }
    public function getPerfil(){
        return $_SESSION['PERFIL']; //retornará el valor que fue asignado en la instruccion de $_SESSION ['PERFIL']
    }
    public function validarSession(){
        if($_SESSION['ID'] == null){ //ACA PREGUNTAMOS SI NO HAY UNA SESION
            header('Location: ../../index.php');
        }
    }
    public function validarSessionAdministrador(){
        if($_SESSION['ID'] != null){//ACA PREGUNTAMOS SI HAY UNA SESION
            if($_SESSION['PERFIL'] == 'Inventarista'){ //en caso de que sea perfil inventarista
                header('Location: ../../Articulos/Pages/index.php');
            }
            
        }
    }

    public function CerrarSesion(){
        $_SESSION['ID'] = null;
        $_SESSION['NOMBRE'] = null;
        $_SESSION['PERFIL'] = null;
        session_destroy();
        header('Location: ../../index.php');
    }

}


?>