<?php
	
/***************************************VER LAS DE AVANCE INFORMATIVO*******************************/
$queryINGE = "SELECT 	pub.ID_Publicacion AS n,
			        	pub.ID_Organizacion,
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
			WHERE cat.ID_Categoria = 'INVI' AND pub.ID_Subcategoria='INGE' AND pub.Estatus='A' AND pub.Estado='PUBLICADA'";

$verINGE = mysql_query($queryINGE,$conexion);
/***************************************VER LAS DE AVANCE INFORMATIVO*******************************/

/***************************************VER LAS DE BOLETIN INFORMATIVO******************************/
$queryBOIF = "SELECT  	pub.ID_Publicacion as n,
				        pub.ID_Organizacion,
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
				WHERE cat.ID_Categoria = 'CAIF' AND pub.ID_Subcategoria='BOIF' AND pub.Estatus='A' AND pub.Estado='PUBLICADA'";

$verBOIF = mysql_query($queryBOIF,$conexion);
/***************************************VER LAS DE BOLETIN INFORMATIVO******************************/
?>