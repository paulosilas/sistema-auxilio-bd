<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$cod_questao = $_POST['codigo'];
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
	?>
	<form name="cadastro_amostra" action="insert_amostra.php" method=POST >
		<h1> Inclusão de Amostra</h1>
		<div id="enunciado">
			<h3>Amostra:</h3><textarea name="amostra"> </textarea>
			<input type="hidden" name="codigo" value="<?php echo $cod_questao; ?>" />
		</div>
		<div class="botaoAtividade">
			<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
		</div>

		<div class="submitAtividade">
			<input type="submit" value="Cadastrar">
		</div>
	</form>
	
	<?php
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