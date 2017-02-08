<?php
	include "template/topo.php";	
	include "template/menu_aluno.php";
	if($_SESSION['cod_nova_atividade'] == null){
		$_SESSION['cod_nova_atividade'] = $_GET['seq'];
	}
	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
?>        

<!-- Inicio dos Scripts -->

<script src="scripts/paging.js"></script>
<script src="scripts/jquery-1.7.2.min.js"></script>
<script src="scripts/filtro.js"></script>

<!-- Fim dos Scripts -->

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "SELECT a.cod_atividade, a.semestre, r.cod_atividade, r.cod_questao, q.cod_questao, q.enunciado FROM atividade as a INNER JOIN questao_e_atividade as r INNER JOIN questao as q WHERE a.cod_atividade = ".$_SESSION['cod_nova_atividade']." AND q.cod_questao = r.cod_questao AND r.cod_atividade =".$_SESSION['cod_nova_atividade'].";";
		$rs = mysql_query($sql, $con);

		if($rs){?>
			
			<table id="tb1" border=1 width=80% align = "center">
				<div id="produtos">
					<tr class="produto">
						<th>Questão</th>
					</tr>
				<?php
				while ($valor = mysql_fetch_array($rs)){
					$tmp = $valor['cod_questao'];
					echo "<tr>
							<td>".$valor["enunciado"]."</td>
						</tr>";					
				}
				mysql_free_result($rs);
			?>
				</div>
			</table>
			<?php

			$_SESSION['respostas_correcao'] = array();

			?>
				<div id="resposta">
					<textarea name="$_SESSION['respostas_correcao'][1]" cols="85" rows="5"><?php echo $_SESSION['respostas_correcao'][1]?></textarea> <br />
				</div>

				<!-- Inicio da Paginação-->

				<div id="pag">
				<div id="pageNav"></div>
					<script>
					    var pager = new Pager('tb1',1); 
					    pager.init(); 
					    pager.showPageNav('pager', 'pageNav'); 
					    pager.showPage(1);
					</script>	
				</div>

				<!-- Fim da Paginação-->
			<?php
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