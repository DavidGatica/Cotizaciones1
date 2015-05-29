<?php
session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: log_in.php');
        }

        $id_usuario = $_SESSION['usuario'];

//incluimos el archivo con las funciones
        include ("funciones_mysql.php");

//Funcion que conecta la base de datos
        $conexion = conectar();
		
		$id_orden_venta=$_GET['id_orden_venta'];
		
		$sql = "SELECT * FROM Orden_Venta WHERE id_orden_venta = '$id_orden_venta'";
		$resultado = query($sql, $conexion);
		$campo = mysql_fetch_array($resultado);
		$fecha_o=$campo['fecha_o'];
		$fecha_eo=$campo['fecha_eo'];
		$pedido_cliente=$campo['pedido_cliente'];
		$lugar_entrega=$campo['lugar_entrega'];
		$importe_letra=$campo['importe_letra'];
		$id_gventas=$campo['id_gventas'];
		$id_goperativa=$campo['id_goperativa'];
		$id_aventas=$campo['id_aventas'];
		$id_cred_y_cobr=$campo['id_cred_y_cobr'];
		$id_cotizacion=$campo['id_cotizacion'];
		$nota_o=$campo['nota_o'];
		

        $sql = "SELECT * FROM Cotizaciones WHERE id_cotizacion = '$id_cotizacion'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);
        $fecha = $campo['fecha'];		        
        $id_usuario = $campo['id_usuario'];
        $vigencia = $campo['vigencia'];
        $no_partidas = $campo['no_partidas'];
        $divisa = $campo['divisa'];
        $subtotal = $campo['subtotal'];
        $iva = $campo['iva'];
        $total = $campo['total'];
        $t_entrega = $campo['t_entrega'];
        $c_pago = $campo['c_pago'];
        $descuento = $campo['descuento'];
        $descuento2 = $descuento * 100;
        $sub = $subtotal;
		$id_cliente = $campo['id_cliente'];
        $subtotal1 = $subtotal * $descuento;
        $subtotal2 = $subtotal - $subtotal1;

        $sql = "SELECT * FROM `Clientes` WHERE `id_num_cliente`='$id_cliente'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);
		$rfc=$campo['id_cliente'];
        $id_direccion = $campo['id_direccion'];
		$id_num_cliente = $campo['id_num_cliente'];

        $sql = "SELECT * FROM Datos_Cotizacion WHERE `id_cotizacion`='$id_cotizacion'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);
        $cliente = $campo['datos_cliente'];
        $contacto = $campo['datos_contacto'];
        $vendedor = $campo['datos_vendedor'];



        $sql = "SELECT * FROM `Clientes` WHERE `id_num_cliente`='$id_num_cliente'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);
        $id_contacto = $campo['id_contacto'];
        $empresa = $campo['empresa'];
		


        $sql = "SELECT * FROM Contacto WHERE id_contacto='$id_contacto'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);

        $nombre_c = $campo['nombre_c'];
        $departamento = $campo['departamento'];
        $telefono1 = $campo['telefono1'];
        $telefono2 = $campo['telefono2'];
        $e_mail_c = $campo['e_mail_c'];


        $sql = "SELECT * FROM Usuarios WHERE id_usuario='$id_usuario'";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);

        $nombre = $campo['nombre'];
        $apellido_p = $campo['apellido_p'];
        $apellido_m = $campo['apellido_m'];
		$vendedor = "$nombre"." "."$apellido_p"." "."$apellido_m";
        $e_mail = $campo['e_mail'];


        $nombre = "$nombre " . "$apellido_p " . "$apellido_m";
		
        $sql = "SELECT * FROM Direcciones WHERE id_direccion=$id_direccion";
        $resultado = query($sql, $conexion);
        $campo = mysql_fetch_array($resultado);

        $calle = $campo['calle'];
        $num_int = $campo['num_int'];
        $num_ext = $campo['num_ext'];
		$direccion = "$calle"." "."$num_int"." "."$num_ext";
        $municipio = $campo['municipio'];
        $estado = $campo['estado'];
        $cp = $campo['cp'];
		$colonia = $campo['colonia'];
//INICIA LA PAGINA WEB
	?>
<!doctype html>
<html>

	<script>
		function imprimir() {

			var objeto = document.getElementById('imprimeme');  //obtenemos el objeto a imprimir
			var ventana = window.open('', '_blank');  //abrimos una ventana vacía nueva
			ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
			ventana.document.close();  //cerramos el documento
			ventana.print();  //imprimimos la ventana
			ventana.close();  //cerramos la ventana
		}
	</script>
	
	<script src="jquery-1.6.2.min.js"></script>
	<script src="jquery-ui-1.8.15.custom.min.js"></script>
    <script type="text/javascript">
       $(function() {
               $("#caja").datepicker({ dateFormat: "yy-mm-dd" }).val()
			   $("#caja1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });
	   
   </script>
	
<head>
    <title>Orden de venta</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="st_orden.css" rel="stylesheet" type="text/css" />
	<link href="jqueryCalendar.css" rel="stylesheet" type="text/css" />
    
<div id="imprimeme">
	
</head>

<body onLoad="document.forma1.cantidad.focus();">

	<div id="contenido">

		<div id="encabezado">
		
			<div id="logo">
			
				<img src="images/alsa_principal.png" alt="Logo de la empresa">
			
			</div>
			
			<div id="nombre_empresa">
			
				ARTEFACTOS LUMÍNICOS S.A. DE C.V.
			
			</div>
			
		</div>	
		
		<div id="datos_grales">
		
			<div id="datos_cliente">
			
				<div id="datos_clientei">
					
					<div class="datos_clienteii">
					
						<h6>Cliente: </h6>
						<h6>Dirección: </h6>
						<h6>Colonia: </h6>
						<h6>Del/Mun: </h6>
						<h6>Teléfono: </h6>
						<h6>At'n: </h6>
			

				
					</div>
					<?php echo "<form method='GET' action='orden_base_datos.php?id_cotizacion='".$id_cotizacion." id='form'></form>";?>
					<div class="datos_clienteid">
					
						<div class="datos">
							<div class="espacio"><?php echo "<div class='resultado'>".$empresa."</div>";?></div>
							<div class="espacio"><?php echo "<div class='resultado'>".$direccion."</div>";?></div>
							<div class="espacio"><?php echo "<div class='resultado'>".$colonia."</div>";?></div>
							<div class="espacio"><?php echo "<div class='resultado'>".$municipio."</div>";?></div>
							<div class="espacio"><?php echo "<div class='resultado'>".$telefono1 ." ". $telefono2."</div>";?></div>
							<?php echo "<div class='resultado'>".$nombre_c."</div>";?>
						</div>
					
					</div>
				
				</div>
				
				<div id="datos_cliented">
				
					<div class="datos_clienteii">
					
						<h6>C.P.: </h6>				
						<h6>Pedido cliente: </h6>
						<h6>R.F.C.: </h6>
						
					</div>
					
					<div class="datos_clientedd">
					
						<div class="datos">
							<div class="espacio2"><?php echo "<div class='resultado'>".$cp."</div>";?></div>
							<div class="espacio2"><?php echo "<div class='resultado'>".$pedido_cliente."</div>";?></div>
							<?php echo "<div class='resultado'>".$rfc."</div>";?>
						</div>
					
					</div>
				
				</div>			
				
			</div>
			
			<div id="orden_venta">
					
					<h6>Orden de venta No.</h6>
					<div class="resultado2"><?php echo $id_orden_venta;?></div>
					
			</div>
			
			<div id="fecha">
			
				<div id="fechai">
				
					<h6>Fecha: </h6>
					<h6>Entrega: </h6>
				
				</div>
				
				<div id="fechad" class="datos">
				
					
					<div class="espacio"><?php echo "<div class='resultado'>".$fecha_o."</div>";?></div>
					<div class="espacio"><?php echo "<div class='resultado'>".$fecha_eo."</div>";?></div>
				
				</div>
			
			</div>
			
			<div id="c_pago">
			
				<h6>Condiciones de pago</h6>
				<textarea class="areatext"><?php echo $c_pago; ?></textarea>
				
			</div>
			

			
			
			
			<div id="lugar_entrega">
			
				<h6>Lugar de entrega:</h6>
				<textarea class="bigareatext" name="lugar_entrega" form="form"></textarea>
			
			</div>
			
			<div id="rep_ventas" class="center">
			
				<h6>Representante de ventas:</h6>
					<input type="text" class="textinput center" value="<?php echo $vendedor; ?>">
			</div>
		
		</div>

		
		
		
								<div class="break"></div>
								
								
		<br />
		<div class="partidas">
		
			<table>
			
				<tr>
				
					<td class="uno">PDA.</th>
					<td class="dos">CANT.</th>
					<td class="tres">UNID.</th>
					<td class="cuatro">CATALOGO</th>
					<td class="cinco">DESCRIPCION</th>
					<td class="seis">P.U.</th>
					<td class="siete">P.T.</th>
				
				</tr>
				
				<?php
//Obtener "tabla Partidas"
                                $sql = "SELECT `partida`,`cantidad`,`unidad`,`catalogo`,`descripcion`,`precio_uni`,`precio_total` FROM `Partidas` WHERE `id_cotizacion` = '$id_cotizacion'";
                                $resultado = query($sql, $conexion);
                                while ($campo = mysql_fetch_array($resultado)) {
                                    $precio_uni = $campo['precio_uni'];
                                    $precio_total = $campo['precio_total'];
                                    $precio_uni = number_format($precio_uni, 2);
                                    $precio_total = number_format($precio_total, 2);

                                    echo
                                    "<tr>" .
                                    "<td>" . $campo['partida'] . "</td>";

                                    if ($campo['cantidad'] == 0) {
                                        echo
                                        "<td> </td>";
                                    } else {
                                        echo
                                        "<td>" . $campo['cantidad'] . "</td>";
                                    }

                                    echo
                                    "<td>" . $campo['unidad'] . "</td>" .
                                    "<td>" . $campo['catalogo'] . "</td>" .
                                    "<td>" . $campo['descripcion'] . "</td>";

                                    if ($campo['precio_uni'] == 0) {
                                        echo
                                        "<td> </td>" .
                                        "<td> </td>";
                                    } else {
                                        echo
                                        "<td>" . $precio_uni . "</td>" .
                                        "<td>" . $precio_total . "</td>";
                                    }
                                    "</tr>";
                                }
                                ?>



                                <tr>
			
			</table>
			
		</div>
		
		<br />
		<br />
		
		<hr />
			
								<div class="break"></div>
		
		<br />
		<br />
		
		<div id="datos_bottom">		
		
			<div id="notas">
				<h6>Notas:</h6> 
				<textarea class="bigareatext3" name="nota_o" form="form"></textarea>
			</div>
			
			<div id="totales">
			
				<div id="totalesi">
				
					<h5>SUBTOTAL:</h5>
					
					<br />
					
					<h5>16% I.V.A.:</h5>
					
					<br />
					
					<br />
					
					<h5>TOTAL:</h5>
				 
				</div>			
				
				<div id="totalesd">
				
					<?php echo '<h5>' . $subtotal .'</h5>';?>
					
					<br />
					
					<?php echo '<h5>' . $iva .'</h5>';?>
					
					<br /> <hr style="float: right;"/>
					
					<br />					
					
					
					<form name="forma1" action="<?php   $pedido_cliente=$_GET['pedido_cliente'];
														echo $_SERVER['PHP_SELF']."?id_cotizacion=".$id_cotizacion."&pedido_cliente=".$pedido_cliente; ?>" method="post">
				<input  type="text" name="cantidad" value="<?php echo isset($_POST['cantidad']) ? $_POST['cantidad'] : $total; ?>" maxlength="21" class="caja_total" />  
				
				<br /><input id="flechita" type="submit" name="boton1" value="">
					
				</div>
		
			</div>
			
					<div id="imp_letra">
		
			<div id="importe"><h6>Importe con letra:</h6></div>
			<textarea class="bigareatext2" name="importe_letra" form="form"><?php echo isset($_POST['cantidad']) ? numtoletras($_POST['cantidad']) : ''; ?></textarea>
			</form>
			
			
			
		
		</div>
		
		</div>


		


						<div class="break"></div>

		<div id="ger_ven">
			<h5>Gerencia de ventas</h5>
			<hr/>
			<br />
				<select name="id_gventas" form="form">
					<option value=""></option>
					<option value="Marco Villar">Marco Villar</option>
				</select>
		</div>						

		<div id="ger_op">
			<h5>Gerencia Operativa</h5>
			<hr/>
			<br />
				<select name="id_goperativa" form="form">
					<option value=""></option>
					<option value="Adriana Villar">Adriana Villar</option>
				</select>
		</div>
		
		<div id="asis_ven">
			<h5>Asistente de ventas</h5>
			<hr/>
			<br />
				<select name="id_aventas" form="form">
					<option value=""></option>
					<option value="Mariela Aguilar">Mariela Aguilar</option>
				</select>
		</div>
		
		<div id="cre_cob">
			<h5>Crédito y Cobranza</h5>
			<hr/>
			<br />
				<select name="id_cred_y_cobr" form="form">
					<option value=""></option>
					<option value="Ana María Villar">Ana María Villar</option>
				</select>
		</div>
		
						<div class="break"></div>
		

	</div>
	
</div>
	<div class="centrar">
	<a href="administracion.php?sec=cotizaciones" id="regresar">Regresar</a>
	<input type="submit" value="Crear" id="crear" form="form">
	</div>
	

</body>



</html>