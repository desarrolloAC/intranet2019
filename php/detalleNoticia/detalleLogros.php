<?php

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/detalleNoticia/logros.php';

$conexion = conectar();

$n = $_GET['n'];

$sql = "SELECT
	 pub.ID_Publicacion AS n,
	 org.Nombre,
	 pub.Titulo AS Titulo,
         logro.tipo_Logro,
	 logro.contenido,
         logro.colaborador,
         logro.departamento,
         logro.cargo,
         logro.foto
FROM publicacion pub
INNER JOIN publicacion_logroext logro ON logro.ID_publicacion  = logro.ID_Publicacion
INNER JOIN subcategoria subc          ON pub.ID_Subcategoria  = subc.ID_Subcategoria
INNER JOIN categoria cat              ON cat.ID_Categoria     = subc.ID_Categoria
INNER JOIN organizacion org           ON org.ID_Organizacion  = pub.ID_Organizacion
WHERE pub.ID_Subcategoria='LOEX' AND pub.Estatus='A' AND pub.Estado='PUBLICADA' AND pub.ID_Publicacion = " . $n . ";";

$rs = mysqli_query($conexion, $sql);

$list = null;


while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    $inst = new ascenso();
    $inst->setOrganization($row["Nombre"]);
    $inst->setTipo_logro($row['Tipo']);
    $inst->setContenido($row['Contenido']);
    $inst->setColaborador($row['colaborador']);
    $inst->setDepartamento($row['departamento']);
    $inst->setCargo($row['cargo']);
    $inst->setFoto($row['foto']);
    $list = $inst;
}



echo json_encode($list);
