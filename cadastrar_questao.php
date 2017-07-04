<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	include "scripts//addNovaAmostra.js";
	$con = conecta();
?>
	
<div id="content">
	<div id="caixa">
	<?php
	if($con){
	?>
	<form name="cadastro_questao" action="insert_questao.php" method=POST onSubmit="return enviarDadosQuestao();">
		<h1> Inclusão de Questão</h1>
		<div id="enunciado">
			<h3>Enunciado:</h3>
			<textarea name="enunciado"></textarea> <br />
		</div>

		<br />

		<div id="enunciado">
			<h3>Resposta:</h3>
			<textarea name="resposta"></textarea> <br />
		</div>

		<div id="enunciado">
			<h3>Amostras:</h3>
			<textarea name="amostra"></textarea> <br /><br />
		</div>

		<div id="campoPai"></div>
		<div id="botaoSomar">
			<input type="button" id="add" value=" + " onclick="addCampos()"> </br>
		</div>
		<div class="selectTipo">
			<h3 class="botaoVoltar">Banco: <select name="codigo" >
		  		<?php
		  			$sql = "SELECT cod_modelo, nome FROM modelo";
		  			$buscaModelo = $con->prepare($sql);
					$buscaModelo->execute();
		  			
					while($modelos = $buscaModelo->fetch(PDO::FETCH_ASSOC)){
						$cod_modelo = $modelos['cod_modelo'];
						$nome = $modelos['nome'];

						echo "<option value='$cod_modelo'>$nome</option>";
					}	
					
		  		?>
			</select></h3>
		</div>
			<h3>Categoria: <select name="cod_tipo">
		  		<?php
		  			$sql2 = "SELECT cod_tipo, tipo FROM tipo_questao";
		  			$buscaTipo = $con->prepare($sql2);
					$buscaTipo->execute();


					while($tipos = $buscaTipo->fetch(PDO::FETCH_ASSOC)){
						$cod_tipo = $tipos['cod_tipo'];
						$tipo = $tipos['tipo'];

						echo "<option value='$cod_tipo'>$tipo</option>";
					}			
		
		  		?>
			</select></h3>
		<div class="botaoAtividade">
			<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
		</div>
		<div class="submitAtividade">
			<input type="submit" value="Cadastrar">
		</div>

	</form>
	
	<?php
	} else{
		echo "Erro de conexão: ".mysql_error();
	}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>