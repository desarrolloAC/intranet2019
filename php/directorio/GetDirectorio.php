<?php

error_reporting(E_ALL);

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/directorio/Directorio.php';


$conexion = conectar();

$query = "SELECT
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
          RIGHT JOIN cargo car         ON car.ID_Cargo = us.ID_Cargo
          RIGHT JOIN departamento dpto ON dpto.ID_Departamento = car.ID_Departamento
          RIGHT JOIN organizacion org  ON org.ID_Organizacion = dpto.ID_Organizacion
          WHERE us.Estatus = 'A'
          ORDER BY us.Cedula;";

$rs = mysql_query($query, $conexion);

$list = [];

while ($row = mysql_fetch_array($rs)) {

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
