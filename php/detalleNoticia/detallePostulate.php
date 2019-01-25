<?php

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/detalleNoticia/postulate.php';

$conexion = conectar();

$n = $_GET['n'];

$sql = "SELECT
	 pub.ID_Publicacion AS n,
	 org.Nombre,
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
WHERE pub.ID_Subcategoria='POST' AND pub.Estatus='A' AND pub.Estado='PUBLICADA' AND pub.ID_Publicacion = " . $n . ";";

$rs = mysqli_query($conexion, $sql);

$list = null;


while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    $inst = new ascenso();
    $inst->setOrganization($row["Nombre"]);
    $inst->setRequisito($row['Colaborador']);
    $inst->setPosiciones($row['departamento']);
    $inst->setResponsabilidades($row['cargo']);
    $inst->setCorreo($row['foto']);
    $inst->setContenido($row['contenido']);
    $list = $inst;
}



echo json_encode($list);
