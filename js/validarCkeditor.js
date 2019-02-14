
$("#btnRegistrar").click(function(e){
     e.preventDefault();
     CKEDITOR.instances.event-body.updateElement();
     $("#form").validate({
         
     });
});