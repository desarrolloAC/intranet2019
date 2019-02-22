<?php

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/index/Publicaciones.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/Autoload.php';

$conexion = conectar();

$sql = "SELECT
	pub.ID_Publicacion AS n,
        pub.ID_Subcategoria as Subcategoria,
	pub.Titulo AS Titulo,
	pub.Foto
FROM    publicacion pub
INNER JOIN subcategoria subc    ON pub.ID_Subcategoria  = subc.ID_Subcategoria
INNER JOIN categoria cat        ON cat.ID_Categoria     = subc.ID_Categoria
WHERE subc.ID_Subcategoria IN(SELECT ID_Subcategoria FROM subcategoria WHERE ID_Categoria = 'CAIF')
AND pub.Estatus='A' AND cat.Estatus='A' AND subc.Estatus='A' AND pub.Estado='PUBLICADA'; ";

$rs = mysqli_query($conexion, $sql);

$list = array();

while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    $inst = new index\Publicaciones();
    $inst->setPublicacionId($row["n"]);
    $inst->setSubcategoriaId($row["Subcategoria"]);
    $inst->setTitulo($row['Titulo']);
    $inst->setFoto($row['Foto']);

    array_push($list, $inst);
}

echo json_encode($list);
