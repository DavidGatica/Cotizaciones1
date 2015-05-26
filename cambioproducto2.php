<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
//incluimos el archivo con las funciones
include ("funciones_mysql.php");



$id_catalogooficial = $_GET['id_catalogooficial'];
$id_catalogo = $_GET['id_catalogo'];
$unidad = $_GET['unidad'];
$descripcion = $_GET['descripcion'];

//Funcion que conecta la base de datos
$conexion = conectar();

$descripcion = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä', 'è', 'ë', 'ê', 'È', 'Ê', 'Ë', 'ì', 'ï', 'î', 'Ì', 'Ï', 'Î', 'ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô', 'ù', 'ü', 'û', 'Ù', 'Û', 'Ü', "'"), array('á', 'a', 'a', 'a', 'Á', 'A', 'A', 'é', 'e', 'e', 'É', 'E', 'E', 'í', 'i', 'i', 'Í', 'I', 'I', 'ó', 'o', 'o', 'Ó', 'O', 'O', 'ú', 'u', 'u', 'Ú', 'U', 'U', "`"), $descripcion
);


//Actualizar la tabla Clientes
$sql = "UPDATE `Catalogo` SET `unidad`='$unidad',`descripcion`= '$descripcion' WHERE `id_catalogo`='$id_catalogooficial'";
$resultado = query($sql, $conexion);


?>




<!DOCTYPE html >
<html>
    <head>
        <title>Consecutivo de Cotizaciones</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="page">
            <div id="header">
                <h1>Artefactos Lumínicos SA de CV</h1>
            </div>

            <div id="main">
                <div class="ic"></div>
<?php
if ($resultado) {
?>
	                <script type="text/javascript">
                    function regresar() {
                        alert("Modificaciones realizadas con Exito");
                        document.location.href = 'log_in.php';
                    }
                    regresar()
                </script>
<?php
} else {?>
   	                <script type="text/javascript">
                    function regresar() {
                        alert("No se agrego el producto, contactar a sistemas");
                        document.location.href = 'log_in.php';
                    }
                    regresar()
                </script><?php
}?>


                </html>
