function enviarDadosUsuario(){
			 
			if(document.cadastro_usuario.nome.value =="")
			{
				alert( "Preencha o nome corretamente!" );
				document.cadastro_usuario.nome.focus();
				return false;
			}			 
			 
			if( document.cadastro_usuario.usuario.value =="")
			{
				alert( "Preencha o usuário corretamente!" );
				document.cadastro_usuario.usuario.focus();
				return false;
			}

			if( document.cadastro_usuario.senha.value =="")
			{
				alert( "Preencha a senha corretamente!" );
				document.cadastro_usuario.senha.focus();
				return false;
			}
			 
			return true;
}