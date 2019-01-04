<?php

require_once('../conexion/conexion.php');

if (!empty($_GET['elegido'])) {

    $link = conectar();

    $sql = " SELECT id_estado,estado
	         FROM paises as p inner join estados e using(ID_PAIS)
	         WHERE p.ID_PAIS='$_GET[elegido]'";

    $rs = mysqli_query($link, $sql);

    echo " <option value=''>Estado</option>";

    while ($row = mysqli_fetch_array($rs, MYSQLI_NUM)) {
        echo "<option value='$row[0]'>" . $row[1] . "</option>";
    }
}
?>
