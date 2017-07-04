<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT * FROM modelo;";

		$buscarBancos = $con->prepare($sql);
		$buscarBancos->execute();

	?>
		<h1> Bancos Cadastrados </h1>
		<table border=1 width=80% align = "center">
			<tr>
				<thead>
					<th>Nome</th>
					<th>Limpar</th>
					<th>Excluir</th>
				</thead>
			</tr>
			<?php
			while($bancos = $buscarBancos->fetch(PDO::FETCH_ASSOC)){
				echo "<tr>
						<td><a href='modelos_cadastrados.php?seq=".
								$bancos["cod_modelo"].
						    "'>".$bancos["nome"]."</a></td>
						<td align='center'><a href='limpar_bd.php?seq=".
								$bancos["cod_modelo"].
						    "'><img src='ico/limpar.png' alt='edit' height='32'></a></td>
						<td align='center'><a href='delet_bd.php?seq=".
								$bancos["cod_modelo"].
						    "' onclick=\"return confirm('Tem certeza que deseja deletar esse banco?');\"><img src='ico/apagar.png' alt='edit' height='32'></a></td>
					</tr>";					
			}
			echo "</table>";
		}else{
			echo "Erro de conexão: ".mysql_error();
		}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>