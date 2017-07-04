<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
			$sql = "SELECT * FROM amostra_dados WHERE cod_amostra=".$_GET['seq'];

			$buscarAmostra = $con->prepare($sql);
			$buscarAmostra->execute();

			while($amostras = $buscarAmostra->fetch(PDO::FETCH_ASSOC)){?>
				<form name="altAmostra" action="update_amostra.php" method=POST>
					<h1> Alteração de Dados de Amostra</h1>

					<input type="hidden" name="cod_amostra" value="<?php echo $amostras['cod_amostra'] ?>" />
					<input type="hidden" name="cod_questao" value="<?php echo $amostras['cod_questao'] ?>" />

					<div id="enunciado">
						<h3>Amostra:</h3>
						<textarea name="amostra"><?php echo $amostras['amostra']; ?></textarea> <br />
					</div>
					<div class="botaoAmostra">
						<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
					</div>
					<div class="submitAmostra">
						<input type="submit" value="Alterar">
					</div>
				</form>
	<?php
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