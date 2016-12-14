<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT * FROM questao WHERE cod_atividade =".$_GET['seq'];
		$rs = mysql_query($sql, $con);
		if($rs){?>
			<h1> Questões Cadastradas </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Enunciado</th>
						<th>Amostra</th>
						<th>Responder</th>
						<th>Alterar</th>
						<th>Excluir</th>
					</thead>
				</tr>
			<?php
				while ($valor = mysql_fetch_array($rs)){
					echo "<tr>
							<td><a href='resposta_cadastrada.php?seq=".
									$valor["cod_questao"].
							    "'>".$valor["enunciado"]."</a></td>
							<td align='center'><a href='amostras.php?seq=".
									$valor["cod_questao"].
							    "'><img src='ico/edit.png' alt='edit' height='16'></a></td>
							<td align='center'><a href='resposta.php?seq=".
									$valor["cod_questao"].
							    "'><img src='ico/edit.png' alt='edit' height='16'></a></td>
							<td align='center'><a href='altera_questao.php?seq=".
									$valor["cod_questao"].
							    "'><img src='ico/edit.png' alt='edit' height='16'></a></td>
							<td align='center'><a href='delet_questao.php?seq=".
									$valor["cod_questao"].
							    "'><img src='ico/delet.png' alt='edit' height='16'></a></td>
						</tr>";					
				}
				mysql_free_result($rs);
				echo "</table>";

				echo "<br />Seleção do banco loja <br />";


				if($db_name != ""){
				$sql2 = "SELECT * FROM fornecedor";
				$rs2 = mysql_query($sql2, $con2);
					while ($valor2 = mysql_fetch_array($rs2)){
						echo $valor2['nome']."<br />";
					}
				}
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