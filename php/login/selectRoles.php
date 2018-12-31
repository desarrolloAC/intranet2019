<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';

if (!empty($_GET['elegido'])) {

    $conexion = conectar();

    $sql = "SELECT r.ID_Rol, r.Nombre
          FROM org_usuario_rol oru
          RIGHT   JOIN rol r          ON(oru.ID_Rol = r.ID_Rol)
          RIGHT   JOIN usuario u      ON(oru.Cedula = u.Cedula)
          RIGHT   JOIN organizacion o ON(oru.ID_Organizacion = o.ID_Organizacion)
          WHERE oru.Estatus = 'A'
          AND     u.Estatus = 'A'
          AND     r.Estatus = 'A'
          AND     o.Estatus = 'A'
          AND     o.ID_Organizacion = '$_GET[elegido]'
          AND     u.Cedula = '$_SESSION[Cedula]' ";

    $rs = mysqli_query($conexion, $sql);

    echo " <option value=''>Perfil Usuario</option>";

    while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
        echo "<option value='$row[ID_Rol]'>" . $row[Nombre] . "</option>";
    }
}
?>
