<?php

	@session_start();

	$sql = "SELECT ID_Subcategoria FROM subcategoria WHERE ID_Subcategoria='INVI'";

	$subc = mysqli_query($conexion,$sql);

	$selectOrg = "SELECT Nombre FROM organizacion WHERE ID_Organizacion = '$_SESSION[ID_Organizacion]'";

	$nombreOrg = mysqli_query($conexion,$selectOrg);

	$org=mysqli_fetch_array($nombreOrg,MYSQLI_ASSOC);

 ?>
<!DOCTYPE html>

<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="invitacionGeneral.css">

    <script>

        function textCounter(field, countfield, maxlimit) {
        if (field.value.length > maxlimit)
        field.value = field.value.substring(0, maxlimit);

        else
        countfield.value = maxlimit - field.value.length;
        }

    </script>


</head>

<body>

    <!--<a href="#formularioInvitacionGeneral">abrir formulario</a>-->

    <!--INICIO DIV CONTENEDOR FORMULARIO-->
    <div id="formularioInvitacionGeneral" class="contenedorFormulario">

        <div id="formularioInvitacionGeneral">

            <a href="#" class="cerrar">X</a>

            <form method="POST" action="php/registrarInvitacionGeneral.php">

                <input id="txtCodigoSubCategoriaInvitacionGeneral" type="text" name="txtCodigoSubCategoriaInvitacionGeneral" value="<?php while($ver = mysql_fetch_array($subc))
					{
						echo $ver['ID_Subcategoria'];
					}	?>" maxlength="4" readonly>

                <textarea id="txtContenidoInvitacionGeneral" name="txtContenidoInvitacionGeneral" onKeyDown="textCounter(this.form.txtContenidoInvitacionGeneral,this.form.remLen,500);" onKeyUp="textCounter(this.form.txtContenidoInvitacionGeneral,this.form.remLen,500);" placeholder="Contenido De La Publicacion" required></textarea>

                <input id="ncaracteresInvitacionGeneral" readonly type=text name=remLen size=3 maxlength=3 value="500">

                <label id="tituloCaracteresInvitacionGeneral">Caracteres Restantes</label>

                <input id="btnImagenInvitacionGeneral" type="file" name="btnImagenInvitacionGeneral" required>

                <textarea id="txtContenidoInvitacionGeneral2" name="txtContenidoInvitacionGeneral2" placeholder="Informacion" required></textarea>

                <input id="btnRegistrarInvitacionGeneral" type="submit" name="btnRegistrarInvitacionGeneral" value="Registrar">

            </form>

        </div>

    </div>
    <!--FIN DIV CONTENEDOR FORMULARIO-->

</body>

</html>
