function enviarDadosBanco(){
			 
			if(document.cadastro_bd.nome.value =="")
			{
				alert( "Preencha o nome do banco corretamente!" );
				document.cadastro_bd.nome.focus();
				return false;
			}			 
			 
			if( document.cadastro_bd.fisico.value =="")
			{
				alert( "Preencha o modelo físico corretamente!" );
				document.cadastro_bd.fisico.focus();
				return false;
			}
			 
			return true;
}