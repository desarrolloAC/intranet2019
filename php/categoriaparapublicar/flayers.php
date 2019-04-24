<?php
@session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$selectOrg = "SELECT Nombre FROM organizacion WHERE ID_Organizacion = '$_SESSION[ID_Organizacion]'";
$nombreOrg = mysqli_query($conexion, $selectOrg);
$org = mysqli_fetch_array($nombreOrg, MYSQLI_ASSOC);
?>

<link rel="stylesheet" type="text/css" href="flayers.css">

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
<div id="formularioFlayers" class="contenedorFormulario">

    <div id="formularioFlayers">

        <a href="#" class="cerrar">X</a>

        <form method="POST" action="php/publicaciones/registrarPublicacionFlayers.php" enctype="multipart/form-data" class="formulario">           
            <input id="txtCodigoSubCategoriaFlayers" type="hidden" name="txtCodigoSubCategoriaFlayers" value="FLAY" maxlength="4" readonly>            
            
            <input id="btnImagenFlayers" type="file" name="btnImagenFlayers" onchange="if ((getFileSize(this.form.fileName.value)) > 300000) {
                        remove();
                        alert('el fichero supera los 300 KB ')}" required>
            <?php
            $sql = " SELECT * FROM organizacion o WHERE o.Estatus = 'A' AND o.ID_Organizacion = '" . $_SESSION['ID_Organizacion'] . "';";
            $rs = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
            $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
            //echo '<img class="logoFlayers" src="' . $row['foto'] . '" type="image/png" width="100" height="100"></img>';
            ?>

            <img class="logoFlayers" src=<?php echo $row['foto'] ?> type="image/png" width="100" height="100"/>
            <input id="btnRegistrarFlayers" type="submit" name="btnRegistrarFlayers" value="Registrar">
            <div class="fondo"><img id="imgSalidaFlayers" src="" style="width:100%; height:auto"/></div>

        </form>

    </div>

</div>
<!--FIN DIV CONTENEDOR FORMULARIO-->