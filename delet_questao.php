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
		//Deleta a amostra da questão
		$sqlDeleteAmostra = "DELETE FROM amostra_dados WHERE cod_questao = $cod_questao;";		
		$deleteAmostra = $con->prepare($sqlDeleteAmostra);
		$deleteAmostra->execute();

		//Deleta a resposta da questão
		$sqlDeleteResposta ="DELETE FROM resposta_certa WHERE cod_questao = $cod_questao;";		
		$deleteResposta = $con->prepare($sqlDeleteResposta);
		$deleteResposta->execute();

		//Zera a chave estrangeira
		$sqlZerarKey = "SET foreign_key_checks = 0;";
		$resetaChave = $con->prepare($sqlZerarKey);
		$resetaChave->execute(); 

		//Deleta a questão
		$sql = "DELETE FROM questao WHERE cod_questao = $cod_questao;";		
		$deleteQuestao = $con->prepare($sql);
		$deleteQuestao->execute(); 

		//Liga a chave estrangeira novamente
		$sqLigarKey = "SET foreign_key_checks = 1;";
		$ligaChave = $con->prepare($sqLigarKey);
		$ligaChave->execute(); 

		echo "<h1>Questão excluida com sucesso.</h1>";
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
