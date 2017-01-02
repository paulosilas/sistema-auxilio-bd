<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	include "scripts//addNovaAmostra.js";
?>        
	
<div id="content">
	<div id="caixa">
	<?php
		if($con){
	?>
	<form name="cadastro_questao" action="insert_questao.php" method=POST >
	<h1> Inclusão de Questão</h1>
	<h1></h1>
	<div id="enunciado">
		<h3>Enunciado:</h3>
		<textarea name="enunciado"></textarea> <br />
	</div>
	<br />
	<div id="enunciado">
			<h3>Resposta:</h3><textarea name="resposta"></textarea> <br />
	</div>

	<h3>Amostras:</h3>
	<div id="campoPai"></div>
	<div id="enunciado">
		<input type="button" value=" + " onclick="addCampos()"> </br>
	</div>
	<div class="selectTipo">
		<h3 class="botaoVoltar">Banco: <select name="codigo" >
	  		<?php
	  			$sql = "select cod_modelo, nome from modelo";
	  			$rs = mysql_query($sql, $con);
	  			if($rs){
				while($valor = mysql_fetch_array($rs)){
					$cod_modelo = $valor['cod_modelo'];
					$nome = $valor['nome'];

					echo "<option value='$cod_modelo'>$nome</option>";
				}	
				mysql_free_result($rs);				
			}
			else{
				echo "Não foi possivel selecionar o modelo: ".mysql_error();
			}
	  		?>
		</select></h3>
	</div>
		<h3>Categoria: <select name="cod_tipo">
	  		<?php
	  			$sql = "select cod_tipo, tipo from tipo_questao";
	  			$rs = mysql_query($sql, $con);
	  			if($rs){
				while($valor = mysql_fetch_array($rs)){
					$cod_tipo = $valor['cod_tipo'];
					$tipo = $valor['tipo'];

					echo "<option value='$cod_tipo'>$tipo</option>";
				}	
				mysql_free_result($rs);				
			}
			else{
				echo "Não foi possivel selecionar a categoria: ".mysql_error();
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