 $(document).ready(function()
 {	     
    /*Para Categorìas ySubcategorías. En Modo Edición
    */
 	$("#txtCodigoCat").change(function()
 	{
		$("#txtCodigoSubC").load('php/selectCategorias.php?elegido=' + $(this).val());
	});
});
