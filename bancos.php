<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
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
						<th>Ativar</th>
						<th>Desativar</th>
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
							    "'><img src='ico/confirmar.png' alt='edit' height='32'></a></td>
							<td align='center'><a href='desativar_banco.php?seq=".
									$valor["cod_modelo"].
							    "'><img src='ico/remover.png' alt='edit' height='32'></a></td>
							<td align='center'><a href='delet_bd.php?seq=".
									$valor["cod_modelo"].
							    "'><img src='ico/apagar.png' alt='edit' height='32'></a></td>
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