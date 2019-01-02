 
 $(document).ready(function(){		     
			
		 	$("#pai").change(function(){
				$("#edo").load('php/estados.php?elegido=' + $(this).val());
			});
		 	 
			
			$("#edo").change(function(){
				$("#mun").load('php/municipios.php?elegido=' + $(this).val());
			});

		    $("#edo").change(function(){
				$("#ciu").load('php/ciudades.php?elegido=' + $(this).val());
			}); 		     
		    
		    $("#mun").change(function(){
				$("#par").load('php/parroquias.php?elegido=' + $(this).val());
			});  
           
             $("#txtDpto").change(function(){
				$("#txtCargo").load('php/selectCargos.php?elegido=' + $(this).val());
			}); 
            
            $("#txtDpto1").change(function(){
				$("#txtCargo1").load('php/selectCargos.php?elegido=' + $(this).val());
			}); 

			$("#txtDpto2").change(function(){
				$("").load('php/selectCargos.php?elegido=' + $(this).val());
			}); 

            /*INHABILITA EL BOTON DE SUBIR IMAGEN. SEGUN LA SUBCATEGORÍA 
             
			$("#txtCodSubCate").change(function(){
               if ($(this).val()=='PE' || $(this).val()=='NV' || $(this).val()=='NH' || $(this).val()=='CP' || $(this).val()=='FA' || $(this).val()=='LE' || $(this).val()=='PO' || $(this).val()=='CM' || $(this).val()=='BI' || $(this).val()=='AI' || $(this).val()=='GN' || $(this).val()=='NI' || $(this).val()=='AS') {
				 $("#btnImage").prop('hidden', true);
				 $("#btnImage").prop('required', false);
			   }else{
                 $("#btnImage").prop('hidden', false);
				 $("#btnImage").prop('required', true);
			   }
			});*/
 
        });
 