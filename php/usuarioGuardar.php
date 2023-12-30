
<?php



// Importamos la conexión a la base de datos
require_once "main.php";
// Importamos para limpiar la cadena
require_once "Str.php";
// Importamos la alerta
require "./Componentes/Alerta.php";
//importamos el mensaje de correcti
require "./Componentes/Exitoso.php";
// Validar datos

require "verificarDatos.php";



// Validar campos vacíos
$esVacio = IsStrVacio($_POST["usuario_nombre"]) || IsStrVacio($_POST["usuario_apellido"]) || IsStrVacio($_POST["usuario_usuario"]) ||
    IsStrVacio($_POST["usuario_correo"]) || IsStrVacio($_POST['clave_1']) || IsStrVacio($_POST['clave_2']);

if ($esVacio) {
    echo ViewAlert("Hay campos vacíos por llenar");
} else {
    $nombre = limpiarCadena($_POST["usuario_nombre"]);
    $apellido = limpiarCadena($_POST["usuario_apellido"]);
    $usuario = limpiarCadena($_POST["usuario_usuario"]);
    $email = limpiarCadena($_POST["usuario_correo"]);
    $clave_1 = limpiarCadena($_POST['clave_1']);
    $clave_2 = limpiarCadena($_POST['clave_2']);
   
    // Verificar formatos
    if (!verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $nombre)) {
        echo ViewAlert("El nombre no coincide con el formato necesario");
        exit();
    }

    if (!verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $apellido)) {
        echo ViewAlert("El apellido no coincide con el formato necesario");
        exit();
    }

    if (!verificarDatos("[a-zA-Z0-9]{4,20}", $usuario)) {
        echo ViewAlert("El usuario no coincide con el formato necesario");
        exit();
    }

    if (!verificarDatos("[a-zA-Z0-9$@.\-]{7,100}", $clave_1) || !verificarDatos("[a-zA-Z0-9$@.\-]{7,100}", $clave_2)) {
        echo ViewAlert("Las claves no cumplen con el formato necesario");
        exit();
    }
    
    // Verificar correo electrónico
    if ($email != "") {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo ViewAlert("Ha ingresado un correo electrónico no válido");
            exit();
        } else {
            $check_email = conexionBD();
            $check_email = $check_email->query("SELECT correo FROM usuarios WHERE correo='$email'");
            if ($check_email->rowCount() > 0) {
                echo ViewAlert("El correo electrónico ingresado ya está registrado, por favor elija otro");
                exit();
            }
            $check_email = null;
        }
    }

    // Verificar usuario
    $check_usuario = conexionBD();
    $check_usuario = $check_usuario->query("SELECT usuario FROM usuarios WHERE usuario='$usuario'");
    if ($check_usuario->rowCount() > 0) {
        echo ViewAlert("El usuario ingresado ya está registrado, por favor elija otro");
        exit();
    }
    $check_usuario = null;

    // Verificar claves
    if ($clave_1 != $clave_2) {
        echo ViewAlert("Las claves que ha ingresado no coinciden");
        exit();
    } else {
        $clave = password_hash($clave_1, PASSWORD_BCRYPT, ["cost" => 10]);
    }

    // Se establece la conexión con la base de datos
$guardar_usuario = conexionBD();

// Se prepara la consulta para insertar datos en la tabla 'usuarios'
$guardar_usuario = $guardar_usuario->prepare("INSERT INTO usuarios(nombre,apellido,usuario,clave,correo) VALUES(:nombre,:apellido,:usuario,:clave,:email)");

// Se crean marcadores para asociar valores con la consulta preparada
$marcadores = [
    ":nombre" => $nombre,
    ":apellido" => $apellido,
    ":usuario" => $usuario,
    ":clave" => $clave,
    ":email" => $email
];

// Se ejecuta la consulta con los valores asociados a los marcadores
$guardar_usuario->execute($marcadores);

// Se verifica si se insertó correctamente el usuario y se muestra un mensaje al usuario
if ($guardar_usuario->rowCount() == 1) {
    echo ViewCorrecto("El usuario se ha registrado correctamente");
} else {
    echo ViewAlert("No se pudo registrar el usuario, por favor intente nuevamente");
}

// Se libera la memoria y se cierra la conexión a la base de datos
$guardar_usuario = null;

}
?>
