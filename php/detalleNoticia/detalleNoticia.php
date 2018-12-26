<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php'; 
include_once $_SERVER["DOCUMENT_ROOT"].'/intranet/php/detalleNoticia/Noticia.php'; 

$conexion = conectar();

$n = $_GET['n'];

$sql = "SELECT pub.ID_Publicacion AS n,
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


$result = mysql_query($sql, $conexion);

$list = null;


while ($mostrarAVIF = mysql_fetch_array($result)) {		

    $inst = new Noticia();
    $inst->setOrganization($mostrarAVIF["org"]);
    $inst->setTitulo($mostrarAVIF['Titulo']);
    $inst->setContenido($mostrarAVIF['Contenido']);
    $inst->setImagen($mostrarAVIF['Foto']);

    $list = $inst;
}

echo json_encode($list);

