<?php

error_reporting(0);

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/detalle/Comunicado.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/Autoload.php';


$conexion = conectar();

$n = $_GET['id'];

$sql = "SELECT
	 pub.ID_Publicacion AS n,
	 org.Nombre AS org,
	 pub.Titulo AS titulo,
     pub.Foto,
	 comu.contenido
FROM publicacion pub
INNER JOIN publicacion_comunicado comu ON comu.ID_publicacion  = pub.ID_Publicacion
INNER JOIN subcategoria subc          ON pub.ID_Subcategoria  = subc.ID_Subcategoria
INNER JOIN categoria cat              ON cat.ID_Categoria     = subc.ID_Categoria
INNER JOIN organizacion org           ON org.ID_Organizacion  = pub.ID_Organizacion
WHERE pub.ID_Subcategoria = (SELECT pub.ID_Subcategoria FROM publicacion pub WHERE pub.ID_Publicacion = ? )
AND pub.Estatus='A' AND pub.Estado='PUBLICADA' AND pub.ID_Publicacion = ? ;";

$stmt = mysqli_prepare($conexion, $sql);
$stmt->bind_param("ii", $n,$n);
$stmt->execute() or die(mysqli_error($conexion));

$list = null;


while ($row = mysqli_fetch_array($stmt->get_result(), MYSQLI_ASSOC)) {

    $inst = new detalle\Comunicado();
    $inst->setPublicacionId($row["n"]);
    $inst->setOrganization($row["org"]);
    $inst->setTitulo($row["titulo"]);
    $inst->setFoto($row["Foto"]);
    $inst->setContenido($row['contenido']);

    $list = $inst;
}

echo json_encode($list);
