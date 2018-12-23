 $(document).ready(() => {	 
     
	/*Para Categorìas ySubcategorías. cuando registras*/
	$("#txtOrg").change(() => {

        $("#txtPerfil").load('php/selectRoles.php?elegido=' + $("#txtOrg").val());
        
	});		       

});