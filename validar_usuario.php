<?php
session_start();

include('funciones_mysql.php');
$conexion = conectar();	

if (isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
$_SESSION['usuario'] = $_POST['id_usuario'];
$_SESSION['password'] = $_POST['password'];

$id_usuario = $_SESSION['usuario'];
$password = $_SESSION['password'];

$usuario = 'ninguno';
$pass = 'ninguno';




$query = "SELECT `id_usuario`, `password` FROM `Log_In` WHERE `id_usuario`='$id_usuario' and `password`='$password'";
$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)) {
    if ($row['id_usuario'] == $id_usuario) {
        $usuario = $row['id_usuario'];
        $pass = $row['password'];
    }
}




if ($usuario == 'ninguno' || $pass == 'ninguno') {
    session_destroy();
    header("Location: log_in.php?op=mal");
} else {

//GUARDA QUERY EN $query
    $query = "SELECT `permiso`, activo FROM `Usuarios` WHERE `id_usuario`='$id_usuario' ";

//GENERA LA QUERY
    $result = mysql_query($query);

//SI EXISTE RESULTADO GUARDA LAS VARIABLES
    if ($row = mysql_fetch_assoc($result)) {
        $permiso = $row['permiso'];
        $activo = $row['activo'];
    }


    if ($permiso == '1' && $activo == '1') {
        $_SESSION['permiso'] = '1';
        header("Location: administracion.php");
    }

    if ($permiso == '2' && $activo == '1') {
        $_SESSION['permiso'] = '2';
        header("Location: ventas.php");
    }

    if ($activo == '0') {

        session_destroy();
        header("Location: log_in.php?op=desactivado");
    }
}
?>