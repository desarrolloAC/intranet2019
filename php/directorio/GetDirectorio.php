<?php

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/directorio/Directorio.php';


$conexion = conectar();

$sql = "SELECT
            us.foto AS foto,
            CONCAT(us.PNombre,' ',us.SNombre,' ',us.PApellido,' ',us.SApellido) AS nc,
            us.Sexo,
            org.Nombre AS organizacion,
            dpto.Nombre AS departamento,
            car.Nombre AS cargo,
            us.Telefono,
            us.Correo,
            us.Direccion
          FROM usuario us
          INNER JOIN cargo car         ON car.ID_Cargo = us.ID_Cargo
          INNER JOIN departamento dpto ON dpto.ID_Departamento = car.ID_Departamento
          INNER JOIN organizacion org  ON org.ID_Organizacion = dpto.ID_Organizacion
          WHERE us.Estatus = 'A'
          ORDER BY nc;";

$rs = mysqli_query($conexion, $sql);

$list = [];

while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    $inst = new Directorio();
    $inst->setFoto($row["foto"]);
    $inst->setNombreCompleto($row['nc']);
    $inst->setSexo($row["Sexo"]);
    $inst->setOrganizacion($row['organizacion']);
    $inst->setDepartamento($row['departamento']);
    $inst->setCargo($row["cargo"]);
    $inst->setTelefono($row['Telefono']);
    $inst->setCorreo($row["Correo"]);
    $inst->setDireccion($row['Direccion']);

    array_push($list, $inst);
}

echo json_encode($list);
