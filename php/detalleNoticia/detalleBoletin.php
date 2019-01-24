<?php

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/detalleNoticia/boletinInformativo.php';

$conexion = conectar();

$n = $_GET['n'];

$sql = "SELECT
	 pub.ID_Publicacion AS n,
	 org.Nombre,
	 pub.Titulo AS Titulo,
	 boif.contenido,
	 boif.imagen1,
	 boif.imagen2,
	 boif.imagen3,
	 boif.imagen4
FROM publicacion pub
INNER JOIN publicacion_boletininf boif ON boif.ID_publicacion  = pub.ID_Publicacion
INNER JOIN subcategoria subc          ON pub.ID_Subcategoria  = subc.ID_Subcategoria
INNER JOIN categoria cat              ON cat.ID_Categoria     = subc.ID_Categoria
INNER JOIN organizacion org           ON org.ID_Organizacion  = pub.ID_Organizacion
WHERE pub.ID_Subcategoria='BOIF' AND pub.Estatus='A' AND pub.Estado='PUBLICADA' AND pub.ID_Publicacion = " . $n . ";";

$rs = mysqli_query($conexion, $sql);

$list = null;


while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    $inst = new boletinInformativo();
    $inst->setOrganization($row["Nombre"]);
    $inst->setContenido($row['Contenido']);
    $inst->setImagen1($row['imagen1']);
    $inst->setImagen2($row['imagen2']);
    $inst->setImagen3($row['imagen3']);
    $inst->setImagen4($row['imagen4']);
    $list = $inst;
}

echo json_encode($list);
