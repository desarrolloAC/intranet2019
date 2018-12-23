 $(document).ready(function()
 {	 
	/*Para Categorìas ySubcategorías. cuando registras*/
	$("#txtCodigoC").change(function()
	{
		$("#txtCodSubCate").load('php/selectCategorias.php?elegido=' + $(this).val());
	});		       

});