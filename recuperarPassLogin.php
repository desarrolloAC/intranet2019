<?php
@session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Intranet Alkes Corp, S.A</title>

    <meta name="viewport" content="width=device-width,device-height initial-scale=1.5" />
    <meta name="copyright" content="Copyright © 2018 Intranet Corporativa Rights Reserved.">
    <meta charset="utf-8">

    <link rel="icon" type="image/png" href="favicon.png" />

    <link rel="stylesheet" href="css/lib/bootstrap.min.css" media="all" />

    <link rel="stylesheet" type="text/css" href="css/structura/estructura.css">
    <link rel="stylesheet" type="text/css" href="css/login/login.css">

    <link rel="stylesheet" type="text/css" href="css/structura/top.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/structura/media.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/structura/structura.css" media="all" />


</head>

<body>


    <?php include $_SERVER["DOCUMENT_ROOT"] . '/intranet/top.php'; ?>


    <!--INICIO DEL DISEÑO FORMULARIO LOGIN-->
    <div class="contenedor_login">
        <form id="formulario" method="POST" action="php/inicioSesion.php">
            <table id="tabla_login" border="1" width="642" cellpadding="0">
                <thead>
                    <tr>
                        <th>
                            <h1 id="titulo_recuperar">Recuperar Su Contraseña</h1>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <center><input id="caja" class="validar" type="text" name="txtCorreo" placeholder="Correo" required></center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                <select name='txtOrg' class='combos_formulario_usuario' id='txtOrg' required>
                                    <option> Organización </option>
                                    <?php
                                        $sql = "  SELECT  DISTINCT(o.ID_Organizacion),o.Nombre
                                                  FROM        org_usuario_rol oru
                                                  RIGHT  JOIN usuario      u  ON (oru.Cedula          =  u.Cedula)
                                                  RIGHT  JOIN organizacion o  ON (oru.ID_Organizacion =  o.ID_Organizacion)
                                                  WHERE  u.Cedula ='$_SESSION[Cedula]'
                                                  AND  oru.Estatus='A'
                                                  AND    o.Estatus='A'
                                                  AND    u.Estatus='A' ";

                                        $rs = mysqli_query($conexion, $sql);

                                        if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                                            do {
                                                echo "<option value='$row[ID_Organizacion]'> $row[Nombre] </option>";
                                            } while ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC));
                                        }
                                    ?>
                                </select>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center><input id="caja" class="validar" type="text" name="txtCorreo" placeholder="Correo" required></center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center><input id="Ingresar" type="submit" name="btnIngresar" value="Recuperar"></center>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <!--FIN DEL DISEÑO FORMULARIO LOGIN-->


</body>

</html>
