<?php
	include "template/topo.php";	
	include "template/menu.php";
	$num_questao = $_POST['num_questao'];
	$enunciado = $_POST['enunciado'];
	$cod_modelo = $_POST['codigo'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "insert into questao(num_questao, enunciado, cod_modelo) ".
			"values ('$num_questao', '$enunciado', '$cod_modelo')";
		$rs = mysql_query($sql, $con);
		if($rs){
			echo "<h1>Questão Cadastrada com Sucesso.</h1>";
		}
		else{
			echo "Erro de inclusão: ".mysql_error();
		}

	} else{
		echo "Erro de conexão: ".mysql_error();
	}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>