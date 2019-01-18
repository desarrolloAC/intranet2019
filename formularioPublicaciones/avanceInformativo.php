<?php
@session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$selectOrg = "SELECT Nombre FROM organizacion WHERE ID_Organizacion = '$_SESSION[ID_Organizacion]'";
$nombreOrg = mysqli_query($conexion, $selectOrg);
$org = mysqli_fetch_array($nombreOrg, MYSQLI_ASSOC);
?>

<link rel="stylesheet" type="text/css" href="avanceInformativo.css">

<script>

    function textCounter(field, countfield, maxlimit) {

        if (field.value.length > maxlimit) {
            field.value = field.value.substring(0, maxlimit);

        } else {
            countfield.value = maxlimit - field.value.length;

        }

    }

    function getFileSize(fileName) {
        if (document.layers) {
            if (navigator.javaEnabled()) {
                var file = new java.io.File(fileName);
                if (location.protocol.toLowerCase() !== 'file:')
                    netscape.security.PrivilegeManager.enablePrivilege(
                            'UniversalFileRead'
                            );
                return file.length();
            } else
                return -1;
        } else if (document.all) {
            window.oldOnError = window.onerror;
            window.onerror = function (err) {
                if (err.indexOf('Automation') !== -1) {
                    alert('file access not possible');
                    return true;
                } else
                    return false;
            };
            var fso = new ActiveXObject('Scripting.FileSystemObject');
            var file = fso.GetFile(fileName);
            window.onerror = window.oldOnError;
            return file.Size;
        }
    }

    function remove() {

        var n = frm.elements.length
        var temp = new Array(n);
        for (i = 0; i <= n - 1; i++)
        {
            temp[i] = frm.elements[i].value
        }
        document.frm.reset()
        for (i = 0; i <= n - 1; i++)
        {
            frm.elements[i].value = temp[i]
        }

    }

</script>

<!--INICIO DIV CONTENEDOR FORMULARIO-->
<div id="formularioAvanceInformativo" class="contenedorFormulario">

    <div id="formularioAvanceInformativo">

        <a href="#" class="cerrar">X</a>

        <form method="POST" action="php/publicaciones/registrarPublicacionAvanceInformativo.php" enctype="multipart/form-data" class="formulario">

            <input id="txtCodigoSubCategoriaAvanceInformativo" type="text" name="txtCodigoSubCategoriaAvanceInformativo" value="AVIF" maxlength="4" readonly>

            <input id="txtCodigoOrganizacionAvanceInformativo" type="text" name="txtCodigoOrganizacionAvanceInformativo" value="<?php echo $org['Nombre']; ?>" maxlength="4" readonly>

            <input id="txtTituloAvanceInformativo" type="text" name="txtTituloAvanceInformativo" value="" maxlength="100" placeholder="Titulo De La Publicacion" required>

            <textarea id="txtContenidoAvanceInformativo"
                      name="txtContenidoAvanceInformativo"
                      onKeyDown="textCounter(this.form.txtContenidoAvanceInformativo, this.form.remLen, 500);"
                      onKeyUp="textCounter(this.form.txtContenidoAvanceInformativo, this.form.remLen, 500);"
                      placeholder="Contenido De La Publicacion"
                      required></textarea>

            <input id="ncaracteresAvanceInformativo" readonly type=text name=remLen size=3 maxlength=3 value="500">

            <label id="tituloCaracteresAvanceInformativo">Caracteres Restantes</label>

            <input id="btnImagenAvanceInformativo" type="file" name="archivo" onchange="if ((getFileSize(this.form.fileName.value)) > 300000) {
                        remove();
                        alert('el fichero supera los 300 KB ')
                    }" required>

            <img id="imgSalida" width="26%" height="21%" src="" />

            <input id="btnImagenAvanceInformativo1" type="file" name="archivo1" onchange="if ((getFileSize(this.form.fileName.value)) > 300000) {
                        remove();
                        alert('el fichero supera los 300 KB ')
                    }" required>

            <img id="imgSalida1" width="26%" height="21%" src="" />

            <input id="btnImagenAvanceInformativo2" type="file" name="archivo2" onchange="if ((getFileSize(this.form.fileName.value)) > 300000) {
                        remove();
                        alert('el fichero supera los 300 KB ')
                    }" required>

            <img id="imgSalida2" width="26%" height="21%" src="" />

            <input id="btnImagenAvanceInformativo3" type="file" name="archivo3" onchange="if ((getFileSize(this.form.fileName.value)) > 300000) {
                        remove();
                        alert('el fichero supera los 300 KB ')
                    }" required>

            <img id="imgSalida3" width="26%" height="21%" src="" />

            <input id="btnRegistrarAvanceInformativo" type="submit" name="btnRegistrarAvanceInformativo" value="Registrar">

        </form>

    </div>

</div>
<!--FIN DIV CONTENEDOR FORMULARIO-->
