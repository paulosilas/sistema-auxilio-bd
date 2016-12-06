<?php
	include "template/topo.php";	
	include "template/menu.php";
	$resposta = $_POST['resposta'];
	$cod_questao = $_POST['codigo'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "insert into resposta_certa(resposta, cod_questao) ".
			"values ('$resposta','$cod_questao')";
		$rs = mysql_query($sql, $con);
		if($rs){
			echo "<h1>Resposta Cadastrada com Sucesso.</h1>";
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