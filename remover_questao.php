<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	$cod_questao = $_GET['seq'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sqlDelete = "SET FOREIGN_KEY_CHECKS = 0;";

		$resetaChave = $con->prepare($sqlDelete);
		$resetaChave->execute();

		$sql = "DELETE FROM questao_e_atividade 
		          WHERE cod_questao = $cod_questao;";	

		$deleteQuestaoAtividade = $con->prepare($sql);
		$deleteQuestaoAtividade->execute();

		$sqlDelete2 = "SET FOREIGN_KEY_CHECKS=1;";

		$ligaChave = $con->prepare($sqlDelete2);
		$ligaChave->execute();

		echo "<h1>Questão Removida com Sucesso.</h1>";
		echo "<div id='redirect'><h3>Você será redirecionado em 3 Segundos... </h3></div>";
	?>
		<meta http-equiv="refresh" content=3;url="http://localhost:8088/template/atividade_questoes.php?seq=<?php echo $_SESSION['cod_nova_atividade'];?>">
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