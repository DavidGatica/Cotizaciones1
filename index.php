<?php
	session_start();
	
	include ("funciones_mysql.php");	//incluimos el archivo con las funciones
	
	$conexion = conectar();				//Funcion que conecta la base de datos
	
	$no_version = 1;			
	$consulta_sql = "SELECT version FROM Version WHERE version_no='$no_version'";		//Consulta a base de datos para obtener versión, teniendo como parámetro $no_version
	$resultado = query($consulta_sql, $conexion);
	$variable = mysql_fetch_array($resultado);
	$version = $variable['version'];
	
?>
<!DOCTYPE html>

<html>	<!--Inicia HTML-->

<head>			<!--Inicia head-->
		
		<link rel="shortcut icon" type="image/png" href="imaghes/icono.png" />
		<link href="index.css" rel="stylesheet" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
		
		<title>		
			Inicio			
		</title>
		
	</head>			<!--Termina head-->

	<body>			<!--Inicia body-->
	
		<div id="pagina">			<!--Inicia pagina-->
		
			<div id="header">			<!--Inicia header-->
			
				<h1>					
					Artefactos Lumínicos SA de CV					
				</h1>		
				
			</div>			<!--Termina header-->
			
			<div id="contenedor_izquierdo">			<!--Inicia contenedor_izquierdo-->
			
				<div id="intro_izquierda">			<!--Inicia intro_izquierda (este div muestra el logo de artefactos lumínicos)-->
				
					<div id="logo">
					
						<img src="images/index_alsa.png" alt="Logo Artefactos Lumínicos"/>
						
					</div>
				
				</div>			<!--Termina intro_izquierda-->
				
			</div>			<!--Termina contenedor_izquierdo-->
			
			<div id="contenedor_derecho">			<!--Inicia contenedor_derecho-->
			
				<div id="intro_derecha">			<!--Inicia intro_derecha-->
				
					<br>
					<br>
					<h2>
						Consecutivo de cotizaciones
					</h2>
					
					<br>
					<br>
					<p>
						Les presentamos el nuevo consecutivo de cotizaciones <?php echo $version; ?> donde 
						podremos cotizar en linea a nuestros respectivos clientes y tener un mejor
						control en el &aacute;rea de ventas. 
						<br>
						<br>
						Para continuar de clic en el botón 'Siguiente'
					</p>
					<br>
					<br>
					<a href="log_in.php" >			<!--Hipervínculo que dirige a log_in.php-->
						<div class="button">			<!--Botón con estilo "button", con click dirije a hipervínculo-->
							Siguiente
						</div>
					</a>			
					
				</div>			<!--Termina intro_derecha-->
				
			</div>			<!--Termina contenedor_derecho-->
			
			<div id="pie_izquierdo">			<!--Inicia pie_izquierdo-->
				
				<div id="logos">

					<a href="http://validator.w3.org/check?uri=http%3A%2F%2Fwww.artefactosluminicos.com.mx%2FCotizaciones%2F">				<!--Hipervínculo para logo de certificación de HTML5-->
						<img 
							src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-performance.png"
							width="90" height="35" alt="HTML5 Powered with CSS3 / Styling, and Performance &amp; Integration" 
							title="HTML5 Powered with CSS3 / Styling, and Performance &amp; Integration"
						/>
					</a>				
					<a href="http://jigsaw.w3.org/css-validator/check/referer">			<!--Hipervínculo para logo de certificación de CSS3-->
						<img 
							style="border:0;width:88px;height:31px"
							src="http://jigsaw.w3.org/css-validator/images/vcss"
							alt="¡CSS Válido!" 
						/>
					</a>	
				
				</div>
				
			</div>			<!--Termina pie_izquierdo-->
			
		</div>			<!--Termina pagina-->
		
	</body>			<!--Termina body-->
	
</html> <!--Cierra HTML-->

