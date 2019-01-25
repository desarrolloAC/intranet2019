<?php

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/detalleNoticia/ascenso.php';

$conexion = conectar();

$n = $_GET['n'];

$sql = "SELECT
	 pub.ID_Publicacion AS n,
	 org.Nombre,
	 pub.Titulo AS Titulo,
	 ascen.colaborador,
	 ascen.departamento,
	 ascen.cargo,
	 ascen.foto,
	 ascen.contenido
FROM publicacion pub
INNER JOIN publicacion_nuevoascenso ascen ON ascen.ID_publicacion  = ascen.ID_Publicacion
INNER JOIN subcategoria subc          ON pub.ID_Subcategoria  = subc.ID_Subcategoria
INNER JOIN categoria cat              ON cat.ID_Categoria     = subc.ID_Categoria
INNER JOIN organizacion org           ON org.ID_Organizacion  = pub.ID_Organizacion
WHERE pub.ID_Subcategoria='ASCE' AND pub.Estatus='A' AND pub.Estado='PUBLICADA' AND pub.ID_Publicacion = " . $n . ";";

$rs = mysqli_query($conexion, $sql);

$list = null;


while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    $inst = new ascenso();
    $inst->setOrganization($row["Nombre"]);
    $inst->setColaborador($row['Colaborador']);
    $inst->setDepartamento($row['departamento']);
    $inst->setCargo($row['cargo']);
    $inst->setFoto($row['foto']);
    $inst->setContenido($row['contenido']);
    $list = $inst;
}



echo json_encode($list);
