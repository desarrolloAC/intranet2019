 $(document).ready(function()
 {	 
	/*Para Categorìas ySubcategorías. cuando registras*/
	$("#txtOrg").change(function()
	{
		$("#txtPerfil").load('../php/selectRoles.php?elegido=' + $(this).val());
	});		       

});