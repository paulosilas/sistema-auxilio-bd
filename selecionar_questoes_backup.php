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
<script src="scripts/paging.js"></script>

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT * FROM questao;";
		$rs = mysql_query($sql, $con);

		if($rs){?>
			<h1> Questões Disponiveis </h1>
			<form name="cadastro_amostra" action="criar_atividade.php" method=POST >
			<table id="tb1" border=1 width=80% align = "center">
				<tr>
						<th>Selecionados</th>
						<th>Enunciado</th>
				</tr>
			<?php
				while ($valor = mysql_fetch_array($rs)){
					echo "<tr>
							<td align='center'><input type='checkbox' name='codigo[]' value='".$valor['cod_questao']."' /></td>
							<td align='left'>".$valor['enunciado']."</td>
						</tr>";					
				}
				mysql_free_result($rs);
				?>
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