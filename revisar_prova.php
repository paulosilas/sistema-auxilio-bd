<?php
	include "template/topo.php";	
	include "template/menu_aluno_prova.php";
	$con = conecta();

	if($_SESSION['cod_nova_atividade'] == null){
		$_SESSION['cod_nova_atividade'] = $_GET['seq'];
	}

	//include "template/segunda_conexao.php";

	$cont = 0;
?>        

<!-- Inicio dos Scripts -->

<script src="scripts/jquery-1.7.2.min.js"></script>
<script src="scripts/paginacaoQuestoes.js"></script>
<script type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("ul.pagination3").quickPagination({pagerLocation:"both",pageSize:"3"});

	});
</script>

<!-- Fim dos Scripts -->

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "SELECT a.cod_atividade, a.semestre, r.cod_atividade, r.cod_questao, q.cod_questao, q.enunciado, q.cod_modelo, m.cod_modelo, m.nome, m.fisico, res.resposta FROM atividade as a INNER JOIN questao_e_atividade as r INNER JOIN questao as q INNER JOIN modelo as m INNER JOIN resposta_certa as res WHERE m.cod_modelo = q.cod_modelo and a.cod_atividade = ".$_SESSION['cod_nova_atividade']." AND q.cod_questao = r.cod_questao AND r.cod_atividade =".$_SESSION['cod_nova_atividade']." AND res.cod_questao = q.cod_questao;";
		$buscarAtividade = $con->prepare($sql);
		$buscarAtividade->execute();

	?>
		<form id="formRespostas" name="dados" action="index_aluno.php" method="POST">
			<ul class="pagination3"><?php

			while($atividades = $buscarAtividade->fetch(PDO::FETCH_ASSOC)){
				$tmp = $atividades['cod_questao'];

				echo "<div id='caixaDoEnunciado'><li class='simples'>".$atividades["enunciado"]."</li></div>
					<div id='caixaDoEnunciado'><li><u>Resposta Esperada:</u> </br></br>".$atividades["resposta"]."</li></div>
					<div id='caixaDoEnunciado'><li><u>Sua Resposta:</u> </br></br>".$_SESSION['respostas_do_aluno'][$cont]."</li></div>";

					$cont++;				
			}

			//Destroi a variavel com as respostas.
			unset($_SESSION['respostas_do_aluno']);
			
			?>
			</ul>
			<div class="submitRespostaFinal">
				<input type="submit" value="Finalizar">
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