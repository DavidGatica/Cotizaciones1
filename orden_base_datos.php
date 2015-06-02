<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header('Location: log_in.php');
}
$id_cotizacion = $_SESSION['id_cotizacion'];

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

//Funcion que conecta la base de datos
$conexion = conectar();

$editar=$_GET['editar'];

if($editar=="si"){

$id_orden_venta = $_POST['id_orden_venta'];
$pedido_cliente = $_POST['pedido_cliente'];
$fecha_o = $_POST['fecha_o'];
$fecha_eo = $_POST['fecha_eo'];
$lugar_entrega = $_POST['lugar_entrega'];
$nota_o = $_POST['nota_o'];
$importe_letra = $_POST['importe_letra'];
$id_gventas = $_POST['id_gventas'];
$id_goperativa = $_POST['id_goperativa'];
$id_aventas = $_POST['id_aventas'];
$id_cred_y_cobr = $_POST['id_cred_y_cobr'];

$pedido_cliente = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä', 'è', 'ë', 'ê', 'È', 'Ê', 'Ë', 'ì', 'ï', 'î', 'Ì', 'Ï', 'Î', 'ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô', 'ù', 'ü', 'û', 'Ù', 'Û', 'Ü', "'"), array('á', 'a', 'a', 'a', 'Á', 'A', 'A', 'é', 'e', 'e', 'É', 'E', 'E', 'í', 'i', 'i', 'Í', 'I', 'I', 'ó', 'o', 'o', 'Ó', 'O', 'O', 'ú', 'u', 'u', 'Ú', 'U', 'U', "`"), $pedido_cliente
);

$lugar_entrega = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä', 'è', 'ë', 'ê', 'È', 'Ê', 'Ë', 'ì', 'ï', 'î', 'Ì', 'Ï', 'Î', 'ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô', 'ù', 'ü', 'û', 'Ù', 'Û', 'Ü', "'"), array('á', 'a', 'a', 'a', 'Á', 'A', 'A', 'é', 'e', 'e', 'É', 'E', 'E', 'í', 'i', 'i', 'Í', 'I', 'I', 'ó', 'o', 'o', 'Ó', 'O', 'O', 'ú', 'u', 'u', 'Ú', 'U', 'U', "`"), $lugar_entrega
);

$nota_o = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä', 'è', 'ë', 'ê', 'È', 'Ê', 'Ë', 'ì', 'ï', 'î', 'Ì', 'Ï', 'Î', 'ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô', 'ù', 'ü', 'û', 'Ù', 'Û', 'Ü', "'"), array('á', 'a', 'a', 'a', 'Á', 'A', 'A', 'é', 'e', 'e', 'É', 'E', 'E', 'í', 'i', 'i', 'Í', 'I', 'I', 'ó', 'o', 'o', 'Ó', 'O', 'O', 'ú', 'u', 'u', 'Ú', 'U', 'U', "`"), $nota_o
);

$sql = "UPDATE Orden_Venta SET id_orden_venta='$id_orden_venta', fecha_o='$fecha_o',`fecha_eo`='$fecha_eo', `pedido_cliente`='$pedido_cliente',`lugar_entrega`='$lugar_entrega',`importe_letra`='$importe_letra',`id_gventas`='$id_gventas',`id_goperativa`='$id_goperativa',`id_aventas`='$id_aventas', id_cred_y_cobr='$id_cred_y_cobr', nota_o='$nota_o' WHERE `id_orden_venta`='$id_orden_venta'";
$resultado = query($sql, $conexion);
}

else{
$id_orden_venta = $_GET['id_orden_venta'];
$pedido_cliente = $_GET['pedido_cliente'];
$fecha_o = $_GET['fecha_o'];
$fecha_eo = $_GET['fecha_oe'];
$lugar_entrega = $_GET['lugar_entrega'];
$nota_o = $_GET['nota_o'];
$importe_letra = $_GET['importe_letra'];
$id_gventas = $_GET['id_gventas'];
$id_goperativa = $_GET['id_goperativa'];
$id_aventas = $_GET['id_aventas'];
$id_cred_y_cobr = $_GET['id_cred_y_cobr'];

$pedido_cliente = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä', 'è', 'ë', 'ê', 'È', 'Ê', 'Ë', 'ì', 'ï', 'î', 'Ì', 'Ï', 'Î', 'ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô', 'ù', 'ü', 'û', 'Ù', 'Û', 'Ü', "'"), array('á', 'a', 'a', 'a', 'Á', 'A', 'A', 'é', 'e', 'e', 'É', 'E', 'E', 'í', 'i', 'i', 'Í', 'I', 'I', 'ó', 'o', 'o', 'Ó', 'O', 'O', 'ú', 'u', 'u', 'Ú', 'U', 'U', "`"), $pedido_cliente
);

$lugar_entrega = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä', 'è', 'ë', 'ê', 'È', 'Ê', 'Ë', 'ì', 'ï', 'î', 'Ì', 'Ï', 'Î', 'ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô', 'ù', 'ü', 'û', 'Ù', 'Û', 'Ü', "'"), array('á', 'a', 'a', 'a', 'Á', 'A', 'A', 'é', 'e', 'e', 'É', 'E', 'E', 'í', 'i', 'i', 'Í', 'I', 'I', 'ó', 'o', 'o', 'Ó', 'O', 'O', 'ú', 'u', 'u', 'Ú', 'U', 'U', "`"), $lugar_entrega
);

$nota_o = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä', 'è', 'ë', 'ê', 'È', 'Ê', 'Ë', 'ì', 'ï', 'î', 'Ì', 'Ï', 'Î', 'ò', 'ö', 'ô', 'Ò', 'Ö', 'Ô', 'ù', 'ü', 'û', 'Ù', 'Û', 'Ü', "'"), array('á', 'a', 'a', 'a', 'Á', 'A', 'A', 'é', 'e', 'e', 'É', 'E', 'E', 'í', 'i', 'i', 'Í', 'I', 'I', 'ó', 'o', 'o', 'Ó', 'O', 'O', 'ú', 'u', 'u', 'Ú', 'U', 'U', "`"), $nota_o
);

//Agregar Campos en la Tabla Cotizaciones
$sqla = "INSERT INTO Orden_Venta (id_orden_venta, fecha_o, fecha_eo, pedido_cliente, lugar_entrega, importe_letra, id_gventas, id_goperativa, id_aventas, id_cred_y_cobr, id_cotizacion, nota_o) values ('$id_orden_venta', '$fecha_o', '$fecha_eo', '$pedido_cliente', '$lugar_entrega', '$importe_letra', '$id_gventas', '$id_goperativa', '$id_aventas', '$id_cred_y_cobr', '$id_cotizacion', '$nota_o')";
$resultadoa = query($sqla, $conexion);


unset($_SESSION['id_cotizacion']);
}

if($editar=='si'){
?>

<html>

    <script type="text/javascript">
	
        function regresar() {
            alert("La orden de venta ha se ha guardado");
            document.location.href = 'administracion.php?sec=orden';
        }
        regresar()
    </script>    
<?php } else {?>
	<script type="text/javascript">
	
        function regresar() {
            alert("La orden de venta ha se ha guardado");
            document.location.href = 'log_in.php';
        }
        regresar()
    </script>
<?php }?>
</html>