<?php
@session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$selectOrg = "SELECT Nombre FROM organizacion WHERE ID_Organizacion = '$_SESSION[ID_Organizacion]'";
$nombreOrg = mysqli_query($conexion, $selectOrg);
$org = mysqli_fetch_array($nombreOrg, MYSQLI_ASSOC);
?>



<link rel="stylesheet" type="text/css" href="invitacionGeneral.css">

<script>

    function textCounter(field, countfield, maxlimit) {

        if (field.value.length > maxlimit) {
            field.value = field.value.substring(0, maxlimit);

        } else {
            countfield.value = maxlimit - field.value.length;

        }

</script>

<!--INICIO DIV CONTENEDOR FORMULARIO-->
<div id="formularioInvitacionGeneral" class="contenedorFormulario">

    <div id="formularioInvitacionGeneral">

        <a href="#" class="cerrar">X</a>

        <form method="POST" action="php/publicaciones/registrarPublicacionInvitacionesGenerales.php">

            <input id="txtCodigoSubCategoriaInvitacionGeneral" type="text" name="txtCodigoSubCategoriaInvitacionGeneral" value="GENE" maxlength="4" readonly>

            <textarea id="txtContenidoInvitacionGeneral"
                      name="txtContenidoInvitacionGeneral"
                      onKeyDown="textCounter(this.form.txtContenidoInvitacionGeneral, this.form.remLen, 500);"
                      onKeyUp="textCounter(this.form.txtContenidoInvitacionGeneral, this.form.remLen, 500);"
                      placeholder="Contenido De La Publicacion"
                      required></textarea>

            <input id="ncaracteresInvitacionGeneral" readonly type=text name=remLen size=3 maxlength=3 value="500">

            <label id="tituloCaracteresInvitacionGeneral">Caracteres Restantes</label>


            <textarea id="txtContenidoInvitacionGeneral2" name="txtContenidoInvitacionGeneral2" placeholder="Informacion" required></textarea>

            <?php
            $sql = " SELECT * FROM organizacion o WHERE o.Estatus = 'A' AND o.ID_Organizacion = '" . $_SESSION['ID_Organizacion'] . "';";
            $rs = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
            $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
            echo '<img src="' . $row['foto'] . '" type="image/png" width="100" height="100"></img>';
            ?>
            <input id="btnRegistrarInvitacionGeneral" type="submit" name="btnRegistrarInvitacionGeneral" value="Registrar">

        </form>

    </div>

</div>
<!--FIN DIV CONTENEDOR FORMULARIO-->
