<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/intranet/php/detalleNoticia/Noticia.php';

$conexion = conectar();

$n = $_GET['n'];

$sql = "SELECT pub.ID_Publicacion AS n,
                         org.Nombre,
                         pub.Titulo AS Titulo,
                         pub.Contenido,
                         pub.Foto
                    FROM publicacion pub INNER JOIN subcategoria subc    ON pub.ID_Subcategoria  = subc.ID_Subcategoria
                                         INNER JOIN categoria cat        ON cat.ID_Categoria     = subc.ID_Categoria
                                         INNER JOIN organizacion org     ON org.ID_Organizacion  = pub.ID_Organizacion
                    WHERE cat.ID_Categoria = 'CAIF' AND pub.ID_Subcategoria='AVIF' AND pub.Estatus='A' AND pub.Estado='PUBLICADA' AND pub.ID_Publicacion = $n;";


$result = mysql_query($sql, $conexion);

$list = null;


while ($mostrarAVIF = mysql_fetch_array($result)) {

    $inst = new Noticia();
    $inst->setOrganization($mostrarAVIF["Nombre"]);
    $inst->setTitulo($mostrarAVIF['Titulo']);
    $inst->setContenido($mostrarAVIF['Contenido']);
    $inst->setImagen($mostrarAVIF['Foto']);

    $list = $inst;
}

echo json_encode($list);

