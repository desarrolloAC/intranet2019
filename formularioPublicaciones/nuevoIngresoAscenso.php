<?php
	/*include $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php';

	@session_start();

	$conexion = conectar();

	include $_SERVER["DOCUMENT_ROOT"].'/intranet/php/selectCargos.php';*/
?>

<!DOCTYPE html>

<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="nuevoIngresoAscenso.css">
	
	<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>	

	<SCRIPT LANGUAGE="JavaScript">
     
        function textCounter(field, countfield, maxlimit) {
        if (field.value.length > maxlimit) 
        field.value = field.value.substring(0, maxlimit);

        else 
        countfield.value = maxlimit - field.value.length;
        }
     
    </script>

    <script type="text/javascript">
    	$(document).ready(function(){
 				$("#txtDpto").change(function(){
				$("#txtCargo").load('../php/selectCargos.php?elegido=' + $(this).val());
			}); 
 		});
    </script>
        

</head>

<body>

	<!--<a href="#formularioNuevoIngresoAscenso">abrir formulario</a>-->

	<!--INICIO DIV CONTENEDOR FORMULARIO-->
	<div id="formularioNuevoIngresoAscenso" class="contenedorFormulario">
				
		<div id="formularioNuevoIngresoAscenso">

			<a href="#" class="cerrar">X</a>

			<form method="POST" action="">
				
				<input id="txtCodigoSubCategoriaNuevoAscenso" type="text" name="txtCodigoSubCategoriaNuevoAscenso" value="" maxlength="4">

				<input id="txtNombreCompletoNuevoAscenso" type="text" name="txtNombreCompletoNuevoAscenso" placeholder="Nombre Completo" required>

				<?php

					echo "
						<select name='txtDpto' class='combos_formulario_usuario' id='txtDpto' required >
						<option> Departamento </option>";

						$query=" SELECT d.ID_Departamento,d.Nombre FROM departamento d WHERE d.Estatus='A'";
						$rs=mysql_query($query,$conexion);
						if($row = mysql_fetch_array($rs)){
							do{										
							   echo "<option value='$row[ID_Departamento]'> $row[Nombre] </option>";
							}while ($row=mysql_fetch_array($rs));
						}
						mysql_free_result($rs);
						echo "</select>";
			 	?>

			 	<select name='txtCargo' class='combos_formulario_usuario' id='txtCargo' required >
				    <option> Cargo </option> 
				</select> 
				
				<textarea id="txtContenidoNuevoAscenso" name="txtContenidoNuevoAscenso" onKeyDown="textCounter(this.form.txtContenidoNuevoAscenso,this.form.remLen,500);" onKeyUp="textCounter(this.form.txtContenidoNuevoAscenso,this.form.remLen,500);" placeholder="Descripcion" required></textarea>

				<input id="ncaracteresNuevoAscenso" readonly type=text name=remLen size=3 maxlength=3 value="500">

				<label id="tituloCaracteresNuevoAscenso">Caracteres Restantes</label>

				<input id="btnImagenNuevoAscenso"  type="file" name="btnImagenNuevoAscenso" required>
			
				<input id="btnRegistrarNuevoAscenso" type="submit" name="btnRegistrarNuevoAscenso" value="Registrar">

			</form>

		</div>

	</div>
	<!--FIN DIV CONTENEDOR FORMULARIO-->

</body>

</html>