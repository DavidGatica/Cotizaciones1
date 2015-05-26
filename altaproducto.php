<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}

//incluimos el archivo con las funciones
include ("funciones_mysql.php");



$id_usuario = $_SESSION['usuario'];
$id_catalogo = $_POST['catalogo'];
$unidad = $_POST['unidad'];
$descripcion = $_POST['descripcion'];


//Funcion que conecta la base de datos
$conexion = conectar();

$id_catalogo = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä', 'è', 'ë', 'ê', 'È', 'Ê', 'Ë', 'ì', 'ï', 'î', 'Ì', 'Ï', 'Î', 'ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô', 'ù', 'ü', 'û', 'Ù', 'Û', 'Ü', "'"), array('á', 'a', 'a', 'a', 'Á', 'A', 'A', 'é', 'e', 'e', 'É', 'E', 'E', 'í', 'i', 'i', 'Í', 'I', 'I', 'ó', 'o', 'o', 'Ó', 'O', 'O', 'ú', 'u', 'u', 'Ú', 'U', 'U', "`"), $id_catalogo
);

$descripcion = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä', 'è', 'ë', 'ê', 'È', 'Ê', 'Ë', 'ì', 'ï', 'î', 'Ì', 'Ï', 'Î', 'ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô', 'ù', 'ü', 'û', 'Ù', 'Û', 'Ü', "'"), array('á', 'a', 'a', 'a', 'Á', 'A', 'A', 'é', 'e', 'e', 'É', 'E', 'E', 'í', 'i', 'i', 'Í', 'I', 'I', 'ó', 'o', 'o', 'Ó', 'O', 'O', 'ú', 'u', 'u', 'Ú', 'U', 'U', "`"), $descripcion
);




//Agregar Campos en la Tabla Catalogo
$sql = "INSERT INTO Catalogo (id_catalogo, unidad, descripcion, activo) VALUES ('$id_catalogo','$unidad','$descripcion','1')";
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





            <script type="text/javascript">
                function regresar() {
                    alert("Se ha agregado el producto con Exito");
                    document.location.href = 'log_in.php';
                }
                regresar()
            </script>


</html>


