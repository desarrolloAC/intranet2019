<?php
    @session_start();
	require_once('../conexion/conexion.php');
	

	print_r($_SESSION);
	if (!empty($_GET['elegido']))
	{
	   $link = conectar();
       $query="   SELECT r.ID_Rol,r.Nombre
                  FROM         org_usuario_rol oru                   
                  RIGHT   JOIN rol               r  ON (oru.ID_Rol  =  r.ID_Rol)
                  RIGHT   JOIN usuario           u  ON (oru.Cedula           =  u.Cedula)
                  RIGHT   JOIN organizacion      o  ON (oru.ID_Organizacion  =  o.ID_Organizacion)
                  WHERE oru.Estatus='A'
                  AND     u.Estatus='A'
                  AND     r.Estatus='A'
                  AND     o.Estatus='A'
                  AND     o.ID_Organizacion='$_GET[elegido]'
                  AND     u.Cedula ='$_SESSION[Cedula]' ";
	
		    $rs=mysql_query($query,$link);			 
			echo " <option value=''>Perfil Usuario</option>";
			while ($row=mysql_fetch_array($rs)){
		     
			echo "<option value='$row[ID_Rol]'>".$row[Nombre]."</option>";
			}
			 
			mysql_free_result($rs);
	}
	
?>										