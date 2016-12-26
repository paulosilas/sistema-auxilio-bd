<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT q.cod_questao, q.enunciado, q.cod_modelo, r.cod_resposta, r.resposta, r.cod_questao FROM questao as q INNER JOIN resposta_certa as r WHERE q.cod_questao = r.cod_questao;";
		$rs = mysql_query($sql, $con);
		if($rs){?>
			<h1> Atividades Cadastrados </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Enunciado</th>
						<th>Resposta</th>
						<th>Amostras</th>
						<th>Excluir</th>
					</thead>
				</tr>
			<?php
				while ($valor = mysql_fetch_array($rs)){
					echo "<tr>
							<td align='center'><a href='altera_questao.php?seq=".
									$valor["cod_questao"].
							    "'>".$valor["enunciado"]."</a></td>
							<td align='center'><a href='altera_resposta.php?seq=".
									$valor["cod_resposta"].
							    "'>".$valor["resposta"]."</a></td>
							<td align='center'><a href='amostras.php?seq=".
									$valor["cod_questao"].
							    "'><img src='ico/delet.png' alt='edit' height='16'></a></td>
							<td align='center'><a href='delet_questao.php?seq=".
									$valor["cod_questao"].
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