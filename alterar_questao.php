<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	include "scripts//addNovaAmostra.js";
	$con = conecta();

	$cod_questao = $_GET['seq'];
?>
	
<div id="content">
	<div id="caixa">
	<?php
		if($con){
			$sql = "SELECT q.cod_questao, q.enunciado, r.cod_questao, r.resposta FROM questao as q INNER JOIN resposta_certa as r WHERE r.cod_questao = ".$cod_questao." AND q.cod_questao = ".$cod_questao.";";
			$buscarQuestao = $con->prepare($sql);
			$buscarQuestao->execute();

			while($questoes = $buscarQuestao->fetch(PDO::FETCH_ASSOC)){
	?>
				<form name="alterar_questao" action="update_questao.php" method=POST onSubmit="return enviarDadosQuestao();">
					
					<input type="hidden" name="cod_questao" value="<?php echo $questoes['cod_questao'] ?>" />

					<h1> Alterar Questão</h1>
					<div id="enunciado">
						<h3>Enunciado:</h3>
						<textarea name="enunciado"><?php echo $questoes['enunciado']; ?></textarea> <br />
					</div>

					<br />

					<div id="enunciado">
						<h3>Resposta:</h3>
						<textarea name="resposta"><?php echo $questoes['resposta']; ?></textarea> <br />
					</div>

					<div class="botaoAtividade">
						<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
					</div>
					<div class="submitAtividade">
						<input type="submit" value="Cadastrar">
					</div>

				</form>
			<?php
			}	
	} else{
		echo "Erro de conexão: ".mysql_error();
	}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>