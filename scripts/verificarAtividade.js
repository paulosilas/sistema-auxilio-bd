function verificaDados(id) {

	var status = document.getElementById('sta'+id).innerHTML;

	if(status == "Disponivel"){
		var resposta = confirm("Deseja iniciar essa atividade?");

    	if (resposta == true) {
        	window.location.href = "iniciar_atividade.php?seq="+id;
    	}

	}else if(status == "Em Andamento"){
		var resposta = confirm("Deseja continuar essa atividade?");

    	if (resposta == true) {
        	window.location.href = "iniciar_atividade.php?seq="+id;
    	}
	}else{
		alert("Você já finalizou essa atividade!");
	}

}
			 