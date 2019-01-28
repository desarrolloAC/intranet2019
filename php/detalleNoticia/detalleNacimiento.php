<?php

error_reporting(0);
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/detalleNoticia/nacimiento.php';

$conexion = conectar();

$n = $_GET['n'];

$sql = "SELECT
	 pub.ID_Publicacion AS n,
	 org.Nombre AS org,
	 pub.Titulo AS Titulo,
         naci.colaborador,
	 naci.contenido,
         naci.foto
FROM publicacion pub
INNER JOIN publicacion_nacimiento naci ON naci.ID_publicacion  = pub.ID_Publicacion
INNER JOIN subcategoria subc          ON pub.ID_Subcategoria  = subc.ID_Subcategoria
INNER JOIN categoria cat              ON cat.ID_Categoria     = subc.ID_Categoria
INNER JOIN organizacion org           ON org.ID_Organizacion  = pub.ID_Organizacion
WHERE pub.ID_Subcategoria='NACI' AND pub.Estatus='A' AND pub.Estado='PUBLICADA' AND pub.ID_Publicacion = ?;";

$stmt = mysqli_prepare($conexion, $sql);
$stmt->bind_param("i", $n);
$stmt->execute() or die(mysqli_error($conexion));

$list = null;


while ($row = mysqli_fetch_array($stmt->get_result(), MYSQLI_ASSOC)) {

    $inst = new Nacimiento();
    $inst->setPublicacionId($row["n"]);
    $inst->setOrganization($row["org"]);
    $inst->setTitulo($row["titulo"]);
    $inst->setColaborador($row['colaborador']);
    $inst->setContenido($row['contenido']);
    $inst->setFoto($row['foto']);
    $list = $inst;
}

echo json_encode($list);
