<?php
	include "template/topo.php";	
	include "template/menu.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "select * from amostra_dados WHERE cod_questao=".$_GET['seq'];
		$rs = mysql_query($sql, $con);
		if($rs){?>
			<h1> Amostras Cadastradas </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Amostra</th>
						<th>Usar</th>
						<th>Alterar</th>
						<th>Excluir</th>
					</thead>
				</tr>
			<?php
				while ($valor = mysql_fetch_array($rs)){
					echo "<tr>
							<td>".$valor["amostra"]."</td>
							<td align='center'><a href='usar_amostra.php?seq=".
									$valor["cod_amostra"].
							    "'><img src='ico/edit.png' alt='edit' height='16'></a></td>
							<td align='center'><a href='altera_amostra.php?seq=".
									$valor["cod_amostra"].
							    "'><img src='ico/edit.png' alt='edit' height='16'></a></td>
							<td align='center'><a href='delet_amostra.php?seq=".
									$valor["cod_amostra"].
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