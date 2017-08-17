<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	$enunciado = $_POST['enunciado'];
	$resposta = $_POST['resposta'];
	$cod_modelo = $_POST['codigo'];	
	$cod_tipo = $_POST['cod_tipo'];
	$cod_questao = "";
	
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){

		if($enunciado != null){
			$sql = "INSERT INTO questao(enunciado, cod_modelo, cod_tipo) VALUES (:e, '$cod_modelo', '$cod_tipo')";
			$insereQuestao = $con->prepare($sql);
			$insereQuestao->bindParam(":e", $enunciado);
			$insereQuestao->execute();

			$cod_questao = $con->lastInsertId();
		}
	
		if($resposta != ""){
			$sql2 = "INSERT INTO resposta_certa(resposta, cod_questao) VALUES (:r,'$cod_questao')";
			$insereResposta= $con->prepare($sql2);
			$insereResposta->bindParam(":r", $resposta);
			$insereResposta->execute();
		
		}else{
			$sql3 = "INSERT INTO resposta_certa(resposta, cod_questao) VALUES ('".null."','$cod_questao')";
			$insereRespostaCerta = $con->prepare($sql3);
			$insereRespostaCerta->execute();
		}	
    	
		echo "<h1>Questão Cadastrada com Sucesso</h1>";
		echo "<div id='redirect'><h3>Você será redirecionado em 3 Segundos... </h3></div>";
		?>
			<meta http-equiv="refresh" content=3;url="/template/questoes.php">
		<?php

		
	} else{
		echo "Erro de conexão: ".mysql_error();
	}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>