<?php
session_start();
//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

$id_cotizacion = $_SESSION['cotizacion'];
$id_nota = $_GET['id_nota'];

$sql = "DELETE FROM Notas WHERE id_cotizacion='$id_cotizacion' and no_nota='$id_nota'";
$resultado = query($sql, $conexion);
if ($resultado) {
    header("Location: notas.php");
}
?>