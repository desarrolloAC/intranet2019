<?php
@session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$selectOrg = "SELECT Nombre FROM organizacion WHERE ID_Organizacion = '$_SESSION[ID_Organizacion]'";
$nombreOrg = mysqli_query($conexion, $selectOrg);
$org = mysqli_fetch_array($nombreOrg, MYSQLI_ASSOC);
?>

<link rel="stylesheet" type="text/css" href="boletinInformativo.css">

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
<div id="formularioBoletinInformativo" class="contenedorFormulario">

    <div id="formularioBoletinInformativo">

        <a href="#" class="cerrar">X</a>

        <form method="POST" action="php/publicaciones/registrarPublicacionBoletinInformativo.php" enctype="multipart/form-data">

            <input id="txtCodigoSubCategoriaBoletinInformativo" type="text" name="txtCodigoSubCategoriaBoletinInformativo" value="BOIF" maxlength="4" readonly>

            <input id="txtCodigoOrganizacionBoletinInformativo" type="text" name="txtCodigoOrganizacionBoletinInformativo" value="<?php echo $org['Nombre']; ?>" maxlength="4">

            <input id="txtTituloBoletinInformativo" type="text" name="txtTituloBoletinInformativo" value="" maxlength="100" placeholder="Titulo De La Publicacion" required>

            <textarea id="txtContenidoBoletinInformativo"
                      name="txtContenidoBoletinInformativo"
                      onKeyDown="textCounter(this.form.txtContenidoBoletinInformativo, this.form.remLen, 500);"
                      onKeyUp="textCounter(this.form.txtContenidoBoletinInformativo, this.form.remLen, 500);"
                      placeholder="Contenido De La Publicacion"
                      required></textarea>

            <input id="ncaracteresBoletinInformativo" readonly type=text name=remLen size=3 maxlength=3 value="500">

            <label id="tituloCaracteresBoletinInformativo">Caracteres Restantes</label>

            <input id="btnImagenBoletinInformativo" type="file" name="archivo"onchange="if ((getFileSize(this.form.fileName.value)) > 300000) {
                        remove();
                        alert('el fichero supera los 300 KB ')
                    }" required>

            <img id="imgSalida" width="26%" height="21%" src="" />

            <input id="btnImagenBoletinInformativo1" type="file" name="archivo1" onchange="if ((getFileSize(this.form.fileName.value)) > 300000) {
                        remove();
                        alert('el fichero supera los 300 KB ')
                    }" required>

            <img id="imgSalida1" width="26%" height="21%" src="" />

            <input id="btnImagenBoletinInformativo2" type="file" name="archivo2" onchange="if ((getFileSize(this.form.fileName.value)) > 300000) {
                        remove();
                        alert('el fichero supera los 300 KB ')
                    }" required>


            <img id="imgSalida2" width="26%" height="21%" src="" />
            <input id="btnImagenBoletinInformativo3" type="file" name="archivo3" onchange="if ((getFileSize(this.form.fileName.value)) > 300000) {
                        remove();
                        alert('el fichero supera los 300 KB ')
                    }" required>


            <img id="imgSalida3" width="26%" height="21%" src="" />
            <input id="btnRegistrarBoletinInformativo" type="submit" name="btnRegistrarBoletinInformativo" value="Registrar">

        </form>

    </div>

</div>
<!--FIN DIV CONTENEDOR FORMULARIO-->
