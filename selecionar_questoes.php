<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

	$_SESSION['semestre'] = $_POST['semestre'];
	$_SESSION['cod_tipo'] = $_POST['codigo'];
	$_SESSION['dataInicio'] = $_POST['dataInicio'];
	$_SESSION['horarioInicio'] = $_POST['horarioInicio'];
	$_SESSION['dataFim'] = $_POST['dataFim'];
	$_SESSION['horarioFim'] = $_POST['horarioFim'];

?>        
<!--Scrips para Paginação e Filtro-->

<script src="scripts/paging.js"></script>
<script src="scripts/jquery-1.7.2.min.js"></script>
<script src="scripts/filtro.js"></script>

<!--Fim dos Scrips-->

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT q.cod_questao, q.enunciado, q.cod_modelo, q.cod_tipo, r.cod_resposta, r.resposta, r.cod_questao, tp.cod_tipo, tp.tipo, m.cod_modelo, m.nome FROM questao as q INNER JOIN resposta_certa as r INNER JOIN tipo_questao as tp INNER JOIN  modelo as m WHERE q.cod_questao = r.cod_questao and q.cod_tipo = tp.cod_tipo and q.cod_modelo = m.cod_modelo;";
		$rs = mysql_query($sql, $con);

		if($rs){?>
	</div>

	<!-- Inicio do Filtro -->
	<?php
		include "template/filtros.php";
	?>

	<!-- Fim do Filtro -->
	<div id="caixa">
			<h1> Questões Disponiveis </h1>
			<form name="cadastro_amostra" action="criar_atividade.php" method=POST >
			<table id="tb1" border=1 width=80% align = "center">
				<div id="produtos">
					<tr class="produto">
						<th>Selecionados</th>
						<th>Enunciado</th>
					</tr>
					<?php
					while ($valor = mysql_fetch_array($rs)){
						echo "<tr class='produto'>
								<td class='frente' style='display:none'>".$valor["tipo"]."</td>
								<td class='dormitorio' style='display:none'>".$valor["nome"]."</td>
								<td align='center'><input type='checkbox' name='codigo[]' value='".$valor['cod_questao']."' /></td>
								<td align='left'>".$valor['enunciado']."</td>
							</tr>";					
					}
					mysql_free_result($rs);
					?>
				</div>
				</table>
				<div id='pag'>
					
					<div id="pageNav"></div>
				    <script>
				        var pager = new Pager('tb1', 5); 
				        pager.init(); 
				        pager.showPageNav('pager', 'pageNav'); 
				        pager.showPage(1);
				    </script>
					
				</div>
				
					<div class="selecionarQuestao">
						<input type="submit" value="Cadastrar">
					</div>
				</form>
				<?php
		}
		else{
			echo "Erro de Consulta de Provas e Questões: ".mysql_error();
		}
	}
	else{
		echo "Erro de conexão: ".mysql_error();
	}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>