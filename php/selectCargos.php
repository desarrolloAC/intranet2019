<?php

require_once('../conexion/conexion.php');

if (!empty($_GET['elegido'])) {

    $link = conectar();

    $sql = "SELECT c.ID_Cargo,c.Nombre
			FROM departamento d
			RIGHT JOIN cargo c ON (d.ID_Departamento=c.ID_Departamento)
			where d.ID_Departamento= '$_GET[elegido]' AND c.Estatus='A'
			ORDER BY c.ID_Cargo ";

    $rs = mysqli_query($link, $sql);

    echo " <option value=''>Cargo</option>";
    while ($row = mysqli_fetch_array($rs, MYSQLI_NUM)) {

        echo "<option value='$row[0]'>" . $row[1] . "</option>";
    }
}
?>
