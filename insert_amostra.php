<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$amostra = $_POST['amostra'];
	$cod_questao = $_POST['codigo'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "insert into amostra_dados(amostra, cod_questao) ".
			"values ('$amostra','$cod_questao')";
		$rs = mysql_query($sql, $con);
		if($rs){
			echo "<h1>Amostra Cadastrada com Sucesso.</h1>";
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