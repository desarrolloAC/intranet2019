<?php
    @session_start();	
	$_SESSION['txtbuscar'] = $_POST['txtbuscar'];	
?>
<script language='javascript'>     
     location.href='../menuAdministrador.php';
</script>