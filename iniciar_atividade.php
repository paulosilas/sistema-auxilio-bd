<?php
	include "template/topo.php";	
	include "template/menu_aluno.php";
	$_SESSION['cod_nova_atividade'] = $_GET['seq'];
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT a.cod_atividade, a.semestre, r.cod_atividade, r.cod_questao, q.cod_questao, q.enunciado FROM atividade as a INNER JOIN questao_e_atividade as r INNER JOIN questao as q WHERE a.cod_atividade = ".$_GET['seq']." AND q.cod_questao = r.cod_questao AND r.cod_atividade =".$_GET['seq'];
		$rs = mysql_query($sql, $con);
		if($rs){?>
			<h1> Questões </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Enunciado</th>
						<th>Responder</th>
						<th>Remover</th>
					</thead>
				</tr>
			<?php
				while ($valor = mysql_fetch_array($rs)){
					echo "<tr>
							<td align='center'>".$valor["enunciado"]."</td>
							<td align='center'><a href='resposta.php?seq=".
									$valor["cod_questao"].
							    "'><img src='ico/editar.png' alt='edit' height='32'></a></td>
							<td align='center'><a href='remover_questao.php?seq=".
									$valor["cod_questao"].
							    "'><img src='ico/remover.png' alt='edit' height='32'></a></td>
						</tr>";					
				}
				mysql_free_result($rs);
				echo "</table>";
				?>
				<form name="cadastro_amostra" action="selecionar_nova_questao2.php" method=POST >
					<input type="hidden" name="codigo" value="<?php echo $_GET['seq']; ?>" />
					<div class="botaoAmostra">
						<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
					</div>
					<div class="submitAmostra">
						<input type="submit" value="+">
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