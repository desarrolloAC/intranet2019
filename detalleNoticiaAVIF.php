<?php
	
	include $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php';

	$conexion = conectar();

	$n = $_GET['n'];

    $sql = "SELECT 	pub.ID_Publicacion AS n,
			        pub.ID_Organizacion AS org,
			        pub.ID_Subcategoria,
			        cat.ID_Categoria,
			        cat.Nombre AS Categoria,
			        subc.Nombre AS SubCategoria,
			        pub.Estatus,
			        pub.Titulo AS Titulo,
			        pub.Foto,
			        pub.Contenido,
			        pub.CreatedBy,
			        pub.F_Publicacion
			FROM    publicacion pub INNER JOIN subcategoria subc    ON pub.ID_Subcategoria  = subc.ID_Subcategoria
			                    INNER JOIN categoria cat        ON cat.ID_Categoria     = subc.ID_Categoria
			WHERE cat.ID_Categoria = 'CAIF' AND pub.ID_Subcategoria='AVIF' AND pub.Estatus='A' AND pub.Estado='PUBLICADA' AND pub.ID_Publicacion = $n;"; 

	$result = mysql_query($sql,$conexion);
	
?>

<!DOCTYPE html>

<html>

<head>

	<title>Intranet Alkes Corp, S.A</title>

	<meta name="viewport" content="width=device-width, initial-scale=0.8.0">
	<link rel="stylesheet" type="text/css" href="estructura/css/index.css" media="screen">
	<link rel="stylesheet" type="text/css" href="estructura/css/media.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/indexNoticiaCapsulaInformativa.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/detalleNoticiaAVIF.css" media="screen">
	
</head>

<body>

	<!--INICIO CONTENEDOR DE CONTENIDOS-->
	<div id="contenedorContenido">

		<!--INICIO CONTENEDOR TOP-->
		<div id="contenedorTop">

			<a href="index.php">
				<img id="logoAlkes" src="imagenes/top/logoAlkes.png">
			</a>

			<a href="login.php">
				<img id="logoUsuario" src="imagenes/top/usuario.png">
			</a>

			<ul class="menu">							
	   			<!--OPCION ACTUALIDAD-->
	   			<li>
	   				<a href="#" title="">Actualidad</a>

	   				<!--SUBMENU DE ACTUALIDAD-->
	   				<ul>
	   					<li>
	   						<a href="#" title="">Últimos proyectos y acuerdos</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Próximos eventos</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Boletín de noticias</a>
	   					</li>
	   				</ul>
	   				<!--FIN DEL SUBMENU ACTUALIDAD-->

	   			</li>
	   			<!--FIN DE LA OPCION ACTUALIDAD-->

	   			<!--OPCION INFORMACION-->
			   	<li>
			   		<a href="#" title="">Informacion</a>

			   		<!--SUBMENU DE INFORMACION-->
	   				<ul>
	   					<li>
	   						<a href="#" title="">Mensajes de la CEO</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Misión y Visión Corporativa</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Directorio de la organización</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Políticas y procedimientos</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Resultados generales</a>
	   					</li>
	   				</ul>
	   				<!--FIN DEL SUBMENU INFORMACION-->

			   	</li>
			   	<!--FIN DE LA OPCION INFORMACION-->

			   	<!--OPCION INFORMACION PARA EL TRABAJO-->
			   	<li>
			   		<a href="#" title="">Informacion para el trabajo</a>

			   		<!--SUBMENU DE INFORMACION PARA EL TRABAJO-->
	   				<ul>
	   					<li>
	   						<a href="#" title="">Acceso a documentos, estudios, informes</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Manuales y procedimientos de trabajo</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Directorio de la organización</a>
	   					</li>
	   					<li>
	   						<a href="#" title="">Políticas y procedimientos</a>
	   					</li>   					
	   				</ul>
	   				<!--FIN DEL SUBMENU INFORMACION PARA EL TRABAJO-->

			   	</li>
			   	<!--FIN DE LA OPCION INFORMACION PARA EL TRABAJO-->
			   
			   	<li>
			   		<a href="directorio.php" title="">Directorio</a>
			   	</li>

			   	<li>
			   		<a href="#" title="">Descargas</a>
			   	</li>

			   	<li>
			   		<a href="../Alkes/index.html" title="">Reservar Sala De Reunion</a>
			   	</li>

			</ul>

		</div>
		<!--FIN CONTENEDOR TOP-->

		<?php
					    
			while ($mostrarAVIF = mysql_fetch_row($result))
	    	{
		
				echo '<div id="contenidoAVIF">

						<div id="contenidoPlantilla">
							'."	<h1 id='titulo'>"	.$mostrarAVIF[7].	"</h1>".'
								<h5 id="org">'		.$mostrarAVIF[1].	"</h5>".'
								<textarea id="contenido" readonly>'		.$mostrarAVIF[9].	"</textarea>".'
						</div>
					
					</div>';
	   		}	
		?>
		

		<!--INICIO FOLLETO INFORMATIVO-->
		<div id="folletoInformativo">
			
			<h1 id="tituloFolletoInformativo">Folleto Informativo</h1>

		</div>
		<!--FIN FOLLETO INFORMATIVO-->

		<!--INICIO NUESTRAS PAGINAS-->
		<div id="nuestrasPaginas">
			
			<h1 id="tituloNuestrasPaginas">Nuestras Paginas</h1>

			<!--INICIO DIV EFECTO SLIDER-->
			<div class="slider">
				<ul>
					<li>
				  		<a id="enlaceAlkes" href="#">				  			
				  			<div id="alkes">
				  				
				  				<h1 id="tituloAlkes">Alkes Corp, S.A</h1>

				  				<img id="imagenAlkes" src="imagenes/footer/logo_alkes.png" alt="">
																								
				  			</div>
				  		</a>
				 	</li>		
					<li>
						<a id="enlaceIEC" href="#">				  			
				  			<div id="caiman">
				  				
				  				<h1 id="tituloCaiman">Industrias El Caiman</h1>

				  				<img id="imagenCaiman" src="imagenes/footer/logo_iec.png" alt="">
																								
				  			</div>
				  		</a>
					</li>
					<li>
						<a id="enlaceVenfruca" href="#">				  			
				  			<div id="venfruca">
				  				
				  				<h1 id="tituloVenfruca">Venezolana De Frutas</h1>

				  				<img id="imagenVenfruca" src="imagenes/footer/logo_venfruca.png" alt="">
																								
				  			</div>
				  		</a>
					</li>
					<li>
						<a id="enlaceFruttech" href="#">				  			
				  			<div id="fruttech">
				  				
				  				<h1 id="tituloFruttech">Fruttech</h1>

				  				<img id="imagenFruttech" src="imagenes/footer/logo_fruttech.png" alt="">
																								
				  			</div>
				  		</a>
					</li>					
				</ul>
			</div>
			<!--FIN DIV EFECTO SLIDER-->
		</div>
		<!--INICIO NUESTRAS PAGINAS-->

		<!--INICIO NUESTRAS REDES-->
		<div id="nuestrasRedes">
			
			<h1 id="tituloNuestrasRedes">Nuestras Redes Sociales</h1>

			<img id="imagenFacebook" class="efectoRotarRedesSociales" src="imagenes/footer/f.png" width="65">

			<img id="imagenFacebook" class="efectoRotarRedesSociales" src="imagenes/footer/instagram.png" width="65">
			
			<img id="imagenFacebook" class="efectoRotarRedesSociales" src="imagenes/footer/twitter.png" width="65">

		</div>
		<!--INICIO NUESTRAS REDES-->

		<!--INICIO COPYRING-->
		<div id="copy">
			<h3 id="derechoAutor">Copyright © 2018 Intranet Corporativa Rights Reserved. </h3>
		</div>
		<!--FIN COPYRING-->
		
	</div>
	<!--FIN CONTENEDOR DE CONTENIDOS-->

</body>

</html>