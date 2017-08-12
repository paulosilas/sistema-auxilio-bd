<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	$cod_questao = $_POST['cod_questao'];
	$enunciado = $_POST['enunciado'];
	$resposta = $_POST['resposta'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	$sql = "UPDATE questao as q INNER JOIN resposta_certa as r ON q.cod_questao = r.cod_questao set q.enunciado = :e, r.resposta = :r WHERE r.cod_questao = '$cod_questao' AND q.cod_questao = '$cod_questao';";		
	$attQuestao = $con->prepare($sql);
	$attQuestao->bindParam(":e", $enunciado);
	$attQuestao->bindParam(":r", $resposta);
	$attQuestao->execute();

		echo "<h1>Questão atualizada com sucesso.</h1>";
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
