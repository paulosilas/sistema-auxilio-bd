function enviardados(){
			 
			if(document.cadastrar_atividade.dataInicio.value =="")
			{
				alert( "Preencha a data de inicio corretamente!" );
				document.cadastrar_atividade.dataInicio.focus();
				return false;
			}			 
			 
			if( document.cadastrar_atividade.horarioInicio.value =="")
			{
				alert( "Preencha o horario de inicio corretamente!" );
				document.cadastrar_atividade.horarioInicio.focus();
				return false;
			}
			 
			if (document.cadastrar_atividade.dataFim.value =="")
			{
				alert( "Preencha a data de fim corretamente!" );
				document.cadastrar_atividade.dataFim.focus();
				return false;
			}
			 
			if (document.cadastrar_atividade.horarioFim.value =="" )
			{
				alert( "Preencha o horario de fim corretamente!" );
				document.cadastrar_atividade.horarioFim.focus();
				return false;
			}
			 
			return true;
}
			 