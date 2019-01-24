<?php

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/detalleNoticia/Noticia.php';

$conexion = conectar();

$n = $_GET['n'];

$sql = "SELECT
            pub.ID_Publicacion AS n,
            org.Nombre,
            pub.Titulo AS Titulo,
            pub.Contenido,
            pub.Foto
       FROM publicacion pub
       INNER JOIN subcategoria subc    ON pub.ID_Subcategoria  = subc.ID_Subcategoria
       INNER JOIN categoria cat        ON cat.ID_Categoria     = subc.ID_Categoria
       INNER JOIN organizacion org     ON org.ID_Organizacion  = pub.ID_Organizacion
       WHERE cat.ID_Categoria = 'CAIF' AND pub.ID_Subcategoria='AVIF' AND pub.Estatus='A' AND pub.Estado='PUBLICADA' AND pub.ID_Publicacion = $n;";


$rs = mysqli_query($conexion, $sql);

$list = null;


while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    $inst = new Noticia();
    $inst->setOrganizacion($row["Nombre"]);
    $inst->setTitulo($row['Titulo']);
    $inst->setContenido($row['Contenido']);
    $inst->setImagen($row['Foto']);

    $list = $inst;
}

echo json_encode($list);
