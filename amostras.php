<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	include "scripts/botaoCadastrarAmostra.js";
	$con = conecta();

	$_SESSION['cod_excluir_amostra'] = $_GET['seq'];
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT * FROM amostra_dados WHERE cod_questao=".$_GET['seq'];

		$buscarAmostra = $con->prepare($sql);
		$buscarAmostra->execute();

	?>
		<h1> Amostras Cadastradas </h1>
		<table border=1 width=80% align = "center">
			<tr>
				<thead>
					<th>Amostra</th>
					<th>Alterar</th>
					<th>Excluir</th>
				</thead>
			</tr>
		<?php
			while($amostras = $buscarAmostra->fetch(PDO::FETCH_ASSOC)){
				echo "<tr>
						<td>".$amostras["amostra"]."</td>
						<td align='center'><a href='altera_amostra.php?seq=".
								$amostras["cod_amostra"].
						    "'><img src='ico/editar.png' alt='edit' height='32'></a></td>
						<td align='center'><a href='delet_amostra.php?seq=".
								$amostras["cod_amostra"].
						    "'><img src='ico/apagar.png' alt='edit' height='32'></a></td>
					</tr>";					
			}
		echo "</table>";
		?>
			<form name="cadastro_amostra" action="cadastrar_amostra.php" method=POST >
				<input type="hidden" name="codigo" value="<?php echo $_GET['seq']; ?>" />
				<div class="botaoAmostra">
					<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
				</div>
				<div class="submitAmostra">
					<input type="submit" value="+">
				</div>
			</form>
			<?php
		}else{
			echo "Erro de conexão: ".mysql_error();
		}
		?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>