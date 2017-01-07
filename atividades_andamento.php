<?php
	include "template/topo.php";	
	include "template/menu_aluno.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT a.cod_atividade, a.semestre, a.cod_professor, a.cod_tipo, a.inicio, a.fim, t.tipo, t.cod_tipo FROM atividade AS a INNER JOIN tipo_atividade as t WHERE a.cod_tipo = t.cod_tipo and now() > a.inicio and now() < a.fim;";

		$rs = mysql_query($sql, $con);
		if($rs){?>
			<h1> Atividades Cadastrados </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Tipo</th>
						<th>Semestre</th>
						<th>Iniciar</th>
					</thead>
				</tr>
			<?php
				while ($valor = mysql_fetch_array($rs)){
					echo "<tr>
							<td align='center'>".$valor["tipo"]."</td>
							<td align='center'>".$valor["semestre"]."</td>
							<td align='center'><a href='iniciar_atividade.php?seq=".
									$valor["cod_atividade"].
							    "'><img src='ico/editar.png' alt='edit' height='32'></a></td>
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