<?php
	include "template/topo.php";	
	include "template/menu_aluno_prova.php";
	$con = conecta();
	
	if($_SESSION['cod_nova_atividade'] == null){
		$_SESSION['cod_nova_atividade'] = $_GET['seq'];
	}

	//include "template/segunda_conexao.php";

	$cont = 0;
	$_SESSION['num_questoes'] = 0;
?>        

<!-- Inicio dos Scripts -->

<script src="scripts/jquery-1.7.2.min.js"></script>

<script src="scripts/paginacaoQuestoes.js"></script>

<script src="scripts/validarRespostas.js"></script>
<script type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("ul.pagination3").quickPagination({pagerLocation:"both",pageSize:"2"});

	});

</script>

<!-- Fim dos Scripts -->

<div id="content">
	<div id="caixa">
	<?php
	if($con){

		$sqlStatus = "SELECT status_atividade from atividade_e_aluno WHERE cod_atividade = ".$_SESSION['cod_nova_atividade']." AND cod_aluno = ".$_SESSION['cod_aluno_logado'].";";
		$buscaStatus = $con->prepare($sqlStatus);
		$buscaStatus->execute();

		while($status = $buscaStatus->fetch(PDO::FETCH_ASSOC)){
			if($status['status_atividade'] == 'Finalizado'){
				?>
					<meta http-equiv="refresh" content=0;url="/template/index_aluno.php">
				<?php
			}else{
				$sqlUpdate = "UPDATE atividade_e_aluno SET status_atividade = 'Em Andamento' WHERE cod_atividade = ".$_SESSION['cod_nova_atividade']." AND cod_aluno = ".$_SESSION['cod_aluno_logado'].";";
				$attStatus = $con->prepare($sqlUpdate);
				$attStatus->execute();
			}
		}

		$sql = "SELECT a.cod_atividade, a.semestre, r.cod_atividade, r.cod_questao, q.cod_questao, q.enunciado, q.cod_modelo, m.cod_modelo, m.nome, m.fisico, aa.status_atividade FROM atividade as a INNER JOIN questao_e_atividade as r INNER JOIN questao as q INNER JOIN modelo as m INNER JOIN atividade_e_aluno  as aa WHERE m.cod_modelo = q.cod_modelo and a.cod_atividade = ".$_SESSION['cod_nova_atividade']." AND q.cod_questao = r.cod_questao AND r.cod_atividade = ".$_SESSION['cod_nova_atividade']." AND aa.cod_atividade = ".$_SESSION['cod_nova_atividade']." AND aa.cod_aluno = ".$_SESSION['cod_aluno_logado'].";";
		$buscaAtividade = $con->prepare($sql);
		$buscaAtividade->execute();

	?>
		<form id="formRespostas" name="dados" action="tester_respostas.php" method=POST onSubmit="return verificaForm();">
			<ul class="pagination3"><?php

			while($questoes = $buscaAtividade->fetch(PDO::FETCH_ASSOC)){
				$_SESSION['cod_modelo_atual'] = $questoes["cod_modelo"];

				$_SESSION['nome_db'] = $questoes['nome'];
	
				$tmp = $questoes['cod_questao'];
				echo "<div id='caixaDoEnunciado'><li>".$questoes["enunciado"]."</li></div>
					<div id='caixaDoEnunciado'><li><textarea name='campo[]' cols='85' rows='5'></textarea></li></div>";
					$_SESSION['respostas_para_comparar'][] = $questoes["cod_questao"];	

					$cont++;

					$_SESSION['num_questoes']++;				
			}?>
			</ul>
			<div class="submitRespostaFinal">
				<input type="submit" value="Finalizar Atividade">
			</div>
		</form>

		<?php

		$_SESSION['respostas_correcao'] = array();

	} else{
		echo "Erro de conexão: ".mysql_error();
	}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>