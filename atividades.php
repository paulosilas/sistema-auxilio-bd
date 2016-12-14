<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT * FROM atividade;";
		$rs = mysql_query($sql, $con);
		if($rs){?>
			<h1> Atividades Cadastrados </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Semestre</th>
						<th>Cadastrar Questões</th>
						<th>Liberar</th>
						<th>Excluir</th>
					</thead>
				</tr>
			<?php
				while ($valor = mysql_fetch_array($rs)){
					echo "<tr>
							<td align='center'><a href='questoes_cadastradas.php?seq=".
									$valor["cod_atividade"].
							    "'>".$valor["semestre"]."</a></td>
							<td align='center'><a href='cadastrar_questao.php?seq=".
									$valor["cod_atividade"].
							    "'><img src='ico/edit.png' alt='edit' height='16'></a></td>
							<td align='center'><a href='alterar_atividade.php?seq=".
									$valor["cod_modelo"].
							    "'><img src='ico/edit.png' alt='edit' height='16'></a></td>
							<td align='center'><a href='delet_atividade.php?seq=".
									$valor["cod_modelo"].
							    "'><img src='ico/delet.png' alt='edit' height='16'></a></td>
						</tr>";					
				}
				mysql_free_result($rs);
				echo "</table>";
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