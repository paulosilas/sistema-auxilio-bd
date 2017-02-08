<?php
	include "template/topo.php";	
	include "template/menu_aluno.php";
	if($_SESSION['cod_nova_atividade'] == null){
		$_SESSION['cod_nova_atividade'] = $_GET['seq'];
	}

	include "template/segunda_conexao.php";
?>        

<!-- Inicio dos Scripts -->

<script src="scripts/jquery-1.7.2.min.js"></script>
<script src="scripts/filtro.js"></script>
<script src="scripts/paginacaoQuestoes.js"></script>

<div class='testee'>
<script type="text/javascript">
$(document).ready(function() {
	$("ul.pagination3").quickPagination({pagerLocation:"both",pageSize:"2"});

});

</script>
</div>

<!-- Fim dos Scripts -->

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "SELECT a.cod_atividade, a.semestre, r.cod_atividade, r.cod_questao, q.cod_questao, q.enunciado, q.cod_modelo, m.cod_modelo, m.nome, m.fisico FROM atividade as a INNER JOIN questao_e_atividade as r INNER JOIN questao as q INNER JOIN modelo as m WHERE m.cod_modelo = q.cod_modelo and a.cod_atividade = ".$_SESSION['cod_nova_atividade']." AND q.cod_questao = r.cod_questao AND r.cod_atividade =".$_SESSION['cod_nova_atividade'].";";
		$rs = mysql_query($sql, $con);

		if($rs){?>
			<form name="cadastro_amostra" action="tester_respostas.php" method=POST >
				<ul class="pagination3"><?php

				while ($valor = mysql_fetch_array($rs)){
					$tmp = $valor['cod_questao'];
					echo "<div id='caixaDoEnunciado'><li>".$valor["enunciado"]."</li></div>
						<div id='caixaDoEnunciado'><li><textarea name='campo[]' cols='85' rows='5'></textarea></li></div>";
						$_SESSION['respostas_para_comparar'][] = $valor["cod_questao"];					
				}
				mysql_free_result($rs);
				?>
				</ul>
				<div class="submitRespostaFinal">
					<input type="submit" value="Finalizar">
				</div>
			</form>

			<?php

			$_SESSION['respostas_correcao'] = array();
		}
		else{
			echo "Erro na Consulta de Questões: ".mysql_error();
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