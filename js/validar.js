$("#btnRegistrar").mousedown(function(){
  for (var i in CKEDITOR.instances){
    CKEDITOR.instances[i].updateElement();
    console.log('valor:  ' + i);
  }
});