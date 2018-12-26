<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php'; 
include_once $_SERVER["DOCUMENT_ROOT"].'/intranet/php/index/Publicaciones.php'; 

$conexion = conectar();

$queryAVIF = "SELECT 	pub.ID_Publicacion AS n,
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
			        	pub.F_Publicacion,
			        	cat.Estatus,
			        	subc.Estatus
			FROM    publicacion pub INNER JOIN subcategoria subc    ON pub.ID_Subcategoria  = subc.ID_Subcategoria
			                        INNER JOIN categoria cat        ON cat.ID_Categoria     = subc.ID_Categoria
			WHERE cat.ID_Categoria = 'CAIF' AND pub.ID_Subcategoria='AVIF' AND pub.Estatus='A' AND cat.Estatus='A' AND subc.Estatus='A' AND pub.Estado='PUBLICADA'";

$verAVIF = mysql_query($queryAVIF,$conexion);

$list = array();



while ($row = mysql_fetch_array($verAVIF)) {		
    
    $inst = new Publicaciones();
    $inst->setPublicacionId($row["n"]);
    $inst->setTitulo($row['Titulo']);
    $inst->setImagen($row['Foto']);
        
    array_push($list, $inst);
    
}

echo json_encode($list);
