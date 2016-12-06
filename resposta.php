<?php
	include "template/topo.php";	
	include "template/menu.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "select * from questao WHERE cod_questao=".$_GET['seq'];
		$rs = mysql_query($sql, $con);
		if($rs){?>
			<h1> Atividades </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Questão</th>
					</thead>
				</tr>
			<?php
			while ($valor = mysql_fetch_array($rs)){
				$tmp = $valor['cod_questao'];
				echo "<tr>
						<td>".$valor["enunciado"]."</td>
						</tr>";					
			}
			mysql_free_result($rs);
			echo "</table>";
			?>
			<form name="conferir_resposta" action="comparar_resposta.php" method=POST >
				<div id="resposta">
					<textarea name="resposta" cols="85" rows="5"></textarea> <br />
				</div>
				<input type="hidden" name="codigo" value="<?php echo $tmp; ?>">
				<input type="submit" value="Confirmar">
			</form>
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