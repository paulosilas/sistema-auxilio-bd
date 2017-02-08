<?php
	include "template/topo.php";	
	include "template/menu_aluno.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT al.nota, ta.tipo, al.cod_atividade FROM atividade_e_aluno as al INNER JOIN atividade as a INNER JOIN tipo_atividade as ta WHERE ta.cod_tipo = a.cod_tipo AND a.cod_atividade = al.cod_atividade AND al.cod_aluno =".$_SESSION['cod_aluno_logado'].";";

		$rs = mysql_query($sql, $con);
		if($rs){?>
			<h1> Notas do Semestre </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Tipo</th>
						<th>Nota</th>
					</thead>
				</tr>
			<?php
				while ($valor = mysql_fetch_array($rs)){
					echo "<tr>
							<td align='center'>".$valor["tipo"]."</td>
							<td align='center'>".$valor["nota"]."</td>
						</tr>";					
				}
				mysql_free_result($rs);
				?>
				
					</table>
					<div class="botaoAtividade">
						<input type="button" value="Voltar" onClick="history.go(-1)">
					</div>

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