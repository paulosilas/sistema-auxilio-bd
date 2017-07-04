<?php
	include "template/topo.php";	
	include "template/menu_aluno.php";
	$con = conecta();

	$_SESSION['cod_nova_atividade'] = null;
?>        

<script src="scripts/verificarAtividade.js"></script>

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT a.cod_atividade, a.semestre, a.cod_professor, a.cod_tipo, a.inicio, a.fim, t.tipo, t.cod_tipo, aa.status_atividade FROM atividade AS a INNER JOIN tipo_atividade as t INNER JOIN atividade_e_aluno as aa INNER JOIN aluno as al WHERE a.cod_tipo = t.cod_tipo and now() > a.inicio and now() < a.fim AND a.cod_atividade = aa.cod_atividade AND aa.cod_aluno = ".$_SESSION['cod_aluno_logado']." AND al.cod_aluno = ".$_SESSION['cod_aluno_logado'].";";

		$buscaAtividadeAtiva = $con->prepare($sql);
		$buscaAtividadeAtiva->execute();

	?>
			<h1> Atividades Cadastrados </h1>
			<table name="atividades_ativas" border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Encerramento <br /> Dia | Horário </th>
						<th>Tipo</th>
						<th>Semestre</th>
						<th>Status</hr>
						<th>Iniciar</th>
					</thead>
				</tr>
			<?php
				while($atividadesAtivas = $buscaAtividadeAtiva->fetch(PDO::FETCH_ASSOC)){
					echo "<tr>
							<td align='center'>".date('d/m/Y | H:i:s', strtotime($atividadesAtivas["fim"]))."</td>
							<td align='center'>".$atividadesAtivas["tipo"]."</td>
							<td align='center'>".$atividadesAtivas["semestre"]."</td>
							<td id='sta".$atividadesAtivas["cod_atividade"]."'align='center'>".$atividadesAtivas["status_atividade"]."</td>
							<td align='center'><a href='javascript:func()' onclick=\"verificaDados(".$atividadesAtivas["cod_atividade"].
							    ");\"><img src='ico/editar.png' alt='edit' height='32'></a></td>
						</tr>";					
				}
				echo "</table>";
	}else{
		echo "Erro de conexão: ".mysql_error();
	}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>