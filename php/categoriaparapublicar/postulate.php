<?php
@session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$selectOrg = "SELECT Nombre FROM organizacion WHERE ID_Organizacion = '$_SESSION[ID_Organizacion]'";
$nombreOrg = mysqli_query($conexion, $selectOrg);
$org = mysqli_fetch_array($nombreOrg, MYSQLI_ASSOC);
?>

<link rel="stylesheet" type="text/css" href="postulate.css">

<script>

    function textCounter(field, countfield, maxlimit) {

        if (field.value.length > maxlimit) {
            field.value = field.value.substring(0, maxlimit);

        } else {
            countfield.value = maxlimit - field.value.length;

        }
    }

</script>



<!--<a href="#formularioPostulate">abrir formulario</a>-->

<!--INICIO DIV CONTENEDOR FORMULARIO-->
<div id="formularioPostulate" class="contenedorFormulario">

    <div id="formularioPostulate">

        <a href="#" class="cerrar">X</a>

        <form method="POST" action="php/publicaciones/registrarPublicacionPostulate.php">

            <input id="txtCodigoSubCategoriaPostulate" type="text" name="txtCodigoSubCategoriaPostulate" value="POST" maxlength="4" readonly>

            <input id="txtCodigoOrganizacionPostulate" type="text" name="txtCodigoOrganizacionPostulate" value="<?php echo $org['Nombre']; ?>" maxlength="4">

            <textarea id="txtContenidoPostulate"
                      name="txtContenidoPostulate"
                      onKeyDown="textCounter(this.form.txtContenidoPostulate, this.form.remLen, 500);"
                      onKeyUp="textCounter(this.form.txtContenidoPostulate, this.form.remLen, 500);"
                      placeholder="Requisitos"
                      required></textarea>

            <input id="ncaracteresPostulate" readonly type=text name=remLen size=3 maxlength=3 value="500">

            <label id="tituloCaracteresPostulate">Caracteres Restantes</label>

            <textarea id="txtPosicionesPostulate"
                      name="txtPosicionesPostulate"
                      onKeyDown="textCounter(this.form.txtPosicionesPostulate, this.form.remLen1, 500);"
                      onKeyUp="textCounter(this.form.txtPosicionesPostulate, this.form.remLen1, 500);"
                      placeholder="Posiciones"
                      required></textarea>

            <input id="ncaracteresPostulate2" readonly type=text name=remLen1 size=3 maxlength=3 value="500">

            <label id="tituloCaracteresPostulate2">Caracteres Restantes</label>

            <textarea id="txtResponsabilidadesPostulate"
                      name="txtResponsabilidadesPostulate"
                      onKeyDown="textCounter(this.form.txtResponsabilidadesPostulate, this.form.remLen2, 500);"
                      onKeyUp="textCounter(this.form.txtResponsabilidadesPostulate, this.form.remLen2, 500);"
                      placeholder="Responsabilidades"
                      required></textarea>

            <input id="ncaracteresPostulate1" readonly type=text name=remLen2 size=3 maxlength=3 value="500">

            <label id="tituloCaracteresPostulate1">Caracteres Restantes</label>
            <label id="tituloCaracteresCorreo">Si estas interesado en postularte envia tu sintesis curricular a la siguiente direccion electronica: </label>
            
            <input id="txtCorreo" type="text" name="txtCorreo" value="" maxlength="100" placeholder="Correo" required>
            <label id="tituloCaracteresFecha"> Valido Hasta:</label>
            
            <input id="txtFecha" type="date" name="txtFecha" required>

            <input id="btnRegistrarPostulate" type="submit" name="btnRegistrarPostulate" value="Registrar">

        </form>

    </div>

</div>
