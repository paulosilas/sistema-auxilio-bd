<script type="text/javascript">
function enviarDadosQuestao(){
			 
			if(document.cadastro_questao.enunciado.value ==""){
				
				var resposta = confirm("Deseja cadastrar essa questão sem um enunciado?");

    			if (resposta == true) {
        			window.location.href = "insert_questao.php";
    			}
    			document.cadastro_questao.enunciado.focus();
				return false;
			}			 
			 
			if(document.cadastro_questao.resposta.value ==""){
				var resposta = confirm("Deseja cadastrar essa questão sem uma resposta?");

    			if (resposta == true) {
        			window.location.href = "insert_questao.php";
    			}
    			document.cadastro_questao.resposta.focus();
				return false;
			}

			if(document.cadastro_questao.amostra.value ==""){
		    	
				var resposta = confirm("Deseja cadastrar essa questão sem uma amostra?");

    			if (resposta == true) {
        			window.location.href = "insert_questao.php";
    			}
    			document.cadastro_questao.amostra.focus();
				return false;
				
			}	
			window.location.href = "insert_questao.php";
			return true;
}
</script>