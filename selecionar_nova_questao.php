<?php
	include "template/topo.php";	
	include "template/menu_professor.php";

?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT * FROM questao;";
		$rs = mysql_query($sql, $con);
		if($rs){?>
			<h1> Questões Disponiveis </h1>
			<form name="cadastro_amostra" action="adicionar_questao.php" method=POST >
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Selecionados</th>
						<th>Enunciado</th>
					</thead>
				</tr>
			<?php
				while ($valor = mysql_fetch_array($rs)){
					echo "<tr>
							<td align='center'><input type='checkbox' name='codigo[]' value='".$valor['cod_questao']."' /></td>
							<td align='left'>".$valor['enunciado']."</td>
						</tr>";					
				}
				mysql_free_result($rs);
				echo "</table>";
				?>
					<div class="botaoAmostra">
						<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
					</div>
					<div class="submitAmostra">
						<input type="submit" value="Confirmar">
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