<script type="text/javascript">
	var qtdeCampos = 0;

	function addCampos() {
	var objPai = document.getElementById("campoPai");
	//Criando o elemento DIV;
	var objFilho = document.createElement("div");
	//Definindo atributos ao objFilho:
	objFilho.setAttribute("id","filho"+qtdeCampos);

	//Inserindo o elemento no pai:
	objPai.appendChild(objFilho);
	//Escrevendo algo no filho recém-criado:
	document.getElementById("filho"+qtdeCampos).innerHTML = "<textarea id='campo"+qtdeCampos+"' name='campo[]'></textarea> <input type='button' onClick='removerCampo("+qtdeCampos+")' value=' – '>";
	qtdeCampos++;
	}

	function removerCampo(id) {
	var objPai = document.getElementById("campoPai");
	var objFilho = document.getElementById("filho"+id);

	//Removendo o DIV com id específico do nó-pai:
	var removido = objPai.removeChild(objFilho);
	}
	</script>