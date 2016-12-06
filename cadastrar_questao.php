<?php
	include "template/topo.php";	
	include "template/menu.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
	?>
	<form name="cadastro_questao" action="insert_questao.php" method=POST >
	<h1> Inclusão de Questão</h1>
	<b>Nº:</b><input type="text" name="num_questao" size=5 maxlenght=11> <br />
	<div id="enunciado">
		<h3>Enunciado:</h3>
		<textarea name="enunciado"> </textarea> <br />
	</div>
	<b>Banco:</b> <select name="codigo">
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
			echo "Erro de Consulta de Questão: ".mysql_error();
		}
  		?>
	</select>
	<br />
	<input type="submit" value="Cadastrar">
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