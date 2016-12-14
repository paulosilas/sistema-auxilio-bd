<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
	?>
	<form name="cadastro_amostra" action="insert_amostra.php" method=POST >
		<h1> Inclusão de Amostra</h1>
		<b>Nº Questão:</b> <select name="codigo">
	 	<?php
	  		$sql = "select cod_questao, num_questao from questao";
	  		$rs = mysql_query($sql, $con);
	  		if($rs){
				while($valor = mysql_fetch_array($rs)){
					$cod_questao = $valor['cod_questao'];
					$num_questao = $valor['num_questao'];

					echo "<option value='$cod_questao'>$num_questao</option>";
				}	
				mysql_free_result($rs);				
			}
			else{
				echo "Erro de Consulta de Questão: ".mysql_error();
			}
	  	?>
		</select>

		<div id="enunciado">
			<h3>Amostra:</h3><textarea name="amostra"> </textarea>
		</div>
		<input type="submit" value="Cadastrar">
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