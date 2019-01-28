<?php

error_reporting(0);
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/detalleNoticia/Postulate.php';

$conexion = conectar();

$n = $_GET['n'];

$sql = "SELECT
	 pub.ID_Publicacion AS n,
	 org.Nombre AS org,
	 pub.Titulo AS Titulo,
	 postu.requisito,
	 postu.posiciones,
	 postu.responsabilidades,
	 postu.correo,
	 postu.contenido
FROM publicacion pub
INNER JOIN publicacion_postulate postu ON postu.ID_publicacion  = postu.ID_Publicacion
INNER JOIN subcategoria subc          ON pub.ID_Subcategoria  = subc.ID_Subcategoria
INNER JOIN categoria cat              ON cat.ID_Categoria     = subc.ID_Categoria
INNER JOIN organizacion org           ON org.ID_Organizacion  = pub.ID_Organizacion
WHERE pub.ID_Subcategoria='POST' AND pub.Estatus='A' AND pub.Estado='PUBLICADA' AND pub.ID_Publicacion = ?;";

$stmt = mysqli_prepare($conexion, $sql);
$stmt->bind_param("i", $n);
$stmt->execute() or die(mysqli_error($conexion));

$list = null;


while ($row = mysqli_fetch_array($stmt->get_result(), MYSQLI_ASSOC)) {

    $inst = new Postulate();
    $inst->setPublicacionId($row["n"]);
    $inst->setOrganization($row["org"]);
    $inst->setTitulo($row["titulo"]);
    $inst->setRequisito($row['colaborador']);
    $inst->setPosiciones($row['departamento']);
    $inst->setResponsabilidades($row['cargo']);
    $inst->setCorreo($row['foto']);
    $inst->setContenido($row['contenido']);
    $list = $inst;
}



echo json_encode($list);
