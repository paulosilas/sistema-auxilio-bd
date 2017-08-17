<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
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
		$sql = "SELECT a.cod_atividade, a.semestre, a.cod_professor, a.cod_tipo, a.inicio, a.fim, a.ano, a.status, t.tipo, t.cod_tipo FROM atividade AS a INNER JOIN tipo_atividade as t WHERE a.cod_tipo = t.cod_tipo;";
		$buscarAtividade = $con->prepare($sql);
		$buscarAtividade->execute();

	?>
	</div>
		<?php
			include "template/filtroAtividade.php";
		?>

	<div id="caixa">
			<h1> Atividades Cadastradas </h1>
			<table id="tb1" border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Ano</th>
						<th>Semestre</th>
						<th>Tipo</th>
						<th>Questões</th>
						<th>Notas</th>
						<th>Excluir</th>
					</thead>
				</tr>
			<?php
				while($atividades = $buscarAtividade->fetch(PDO::FETCH_ASSOC)){
					if($atividades["status"] == 1){
					echo "<tr class='produto'>
							<td class='primeiro' align='center'>".$atividades["ano"]."</td>
							<td class='segundo' align='center'>".$atividades["semestre"]."</td>
							<td align='center'>".$atividades["tipo"]."</td>
							<td align='center'><a href='atividade_questoes.php?seq=".
									$atividades["cod_atividade"].
							    "'><img src='ico/editar.png' alt='edit' height='32'></a></td>
							<td align='center'><a href='notas_alunos.php?seq=".
									$atividades["cod_atividade"].
							    "'><img src='ico/amostra.png' alt='edit' height='32'></a></td>
							<td align='center'><a href='delet_atividade.php?seq=".
									$atividades["cod_atividade"].
							    "' onclick=\"return confirm('Tem certeza que deseja apagar esta atividade?');\"><img src='ico/apagar.png' alt='edit' height='32'></a></td>
						</tr>";
					}					
				}
				echo "</table>";
				?>
				<!-- Inicio da Paginação-->
				<div id="pag">
				<div id="pageNav"></div>
					<script>
					    var pager = new Pager('tb1',10); 
					    pager.init(); 
					    pager.showPageNav('pager', 'pageNav'); 
					    pager.showPage(1);
					</script>	
				</div>
				<!-- Fim da Paginação-->
				<?php
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