<?php

require_once('../conexion/conexion.php');
if (!empty($_GET['elegido'])) {

    $link = conectar();

    $sql = " SELECT ID_PARROQUIA,PARROQUIA
		         FROM municipios as m inner join parroquias as p using(ID_MUNICIPIO)
		         WHERE m.ID_MUNICIPIO='$_GET[elegido]'";

    $rs = mysqli_query($link, $sql);

    echo " <option value=''>Parroquia</option>";
    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

        echo "<option value='$row[0]'> $row[1] </option>";
    }
}
?>
