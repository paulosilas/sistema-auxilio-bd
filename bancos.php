<?php
	include "template/topo.php";	
	include "template/menu.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT * FROM modelo;";
		$rs = mysql_query($sql, $con);
		if($rs){?>
			<h1> Bancos Cadastrados </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Nome</th>
						<th>Usar</th>
						<th>Desativar</th>
						<th>Criar</th>
						<th>Excluir</th>
					</thead>
				</tr>
			<?php
				while ($valor = mysql_fetch_array($rs)){
					echo "<tr>
							<td><a href='modelos_cadastrados.php?seq=".
									$valor["cod_modelo"].
							    "'>".$valor["nome"]."</a></td>
							<td align='center'><a href='usar_banco.php?seq=".
									$valor["cod_modelo"].
							    "'><img src='ico/edit.png' alt='edit' height='16'></a></td>
							<td align='center'><a href='desativar_banco.php?seq=".
									$valor["cod_modelo"].
							    "'><img src='ico/edit.png' alt='edit' height='16'></a></td>
							<td align='center'><a href='gerar_banco.php?seq=".
									$valor["cod_modelo"].
							    "'><img src='ico/edit.png' alt='edit' height='16'></a></td>
							<td align='center'><a href='delet_bd.php?seq=".
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