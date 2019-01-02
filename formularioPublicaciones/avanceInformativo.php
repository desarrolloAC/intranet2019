<?php

	@session_start();

	$sql = "SELECT ID_Subcategoria FROM subcategoria WHERE ID_Subcategoria='AVIF'";

	$subc = mysqli_query($conexion,$sql);

	$selectOrg = "SELECT Nombre FROM organizacion WHERE ID_Organizacion = '$_SESSION[ID_Organizacion]'";

	$nombreOrg = mysqli_query($conexion,$selectOrg);

	$org=mysqli_fetch_array($nombreOrg,MYSQLI_ASSOC);

 ?>

<!DOCTYPE html>

<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="avanceInformativo.css">


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


    <!--<a href="#formularioAvanceInformativo">abrir</a>-->


    <!--INICIO DIV CONTENEDOR FORMULARIO-->
    <div id="formularioAvanceInformativo" class="contenedorFormulario">

        <div id="formularioAvanceInformativo">

            <a href="#" class="cerrar">X</a>

            <form method="POST" action="php/registrarPublicacion.php" enctype="multipart/form-data" class="formulario">

                <input id="txtCodigoSubCategoriaAvanceInformativo" type="text" name="txtCodigoSubCategoriaAvanceInformativo" value="<?php while($ver = mysqli_fetch_array($subc,MYSQLI_ASSOC))
					{
						echo $ver['ID_Subcategoria'];
					}	?>" maxlength="4" readonly>

                <input id="txtCodigoOrganizacionAvanceInformativo" type="text" name="txtCodigoOrganizacionAvanceInformativo" value="<?php echo $org['Nombre']; ?>" maxlength="4" readonly>

                <input id="txtTituloAvanceInformativo" type="text" name="txtTituloAvanceInformativo" value="" maxlength="100" placeholder="Titulo De La Publicacion" required>

                <textarea id="txtContenidoAvanceInformativo" name="txtContenidoAvanceInformativo" onKeyDown="textCounter(this.form.txtContenidoAvanceInformativo,this.form.remLen,500);" onKeyUp="textCounter(this.form.txtContenidoAvanceInformativo,this.form.remLen,500);" placeholder="Contenido De La Publicacion" required></textarea>

                <input id="ncaracteresAvanceInformativo" readonly type=text name=remLen size=3 maxlength=3 value="500">
                <label id="tituloCaracteresAvanceInformativo">Caracteres Restantes</label>

                <input id="btnImagenAvanceInformativo" type="file" name="archivo" required>
                <img id="imgSalida" width="26%" height="21%" src="" />

                <input id="btnImagenAvanceInformativo1" type="file" name="archivo1">
                <img id="imgSalida1" width="26%" height="21%" src="" />

                <input id="btnImagenAvanceInformativo2" type="file" name="archivo2">
                <img id="imgSalida2" width="26%" height="21%" src="" />

                <input id="btnImagenAvanceInformativo3" type="file" name="archivo3">
                <img id="imgSalida3" width="26%" height="21%" src="" />

                <input id="btnRegistrarAvanceInformativo" type="submit" name="btnRegistrarAvanceInformativo" value="Registrar">

            </form>

        </div>

    </div>
    <!--FIN DIV CONTENEDOR FORMULARIO-->

</body>

</html>
