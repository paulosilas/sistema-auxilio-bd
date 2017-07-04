function verificaForm(){
  var localValidar = document.getElementById('formRespostas');
  var formulario = localValidar.getElementsByTagName("textarea");

  for(var x=0; x < formulario.length; x++){
    if(formulario[x].value == ""){
      alert("Você precisa responder todas as questões!");
      formulario[x].focus();
      return false;
    }                             
  }
  return(true);
}