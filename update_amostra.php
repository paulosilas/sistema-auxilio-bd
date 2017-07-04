<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	$cod_amostra = $_POST['cod_amostra'];
	$cod_questao = $_POST['cod_questao'];
	$amostra = $_POST['amostra'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "UPDATE amostra_dados set amostra = :a WHERE cod_amostra = $cod_amostra;";		
		$attAmostra = $con->prepare($sql);
		$attAmostra->bindParam(":a", $amostra);
		$attAmostra->execute();

		echo "<h1>Amostra atualizada com sucesso.</h1>";
		echo "<div id='redirect'><h3>Você será redirecionado em 3 Segundos... </h3></div>";
	?>
		<meta http-equiv="refresh" content=3;url="http://localhost:8088/template/amostras.php?seq=<?php echo $cod_questao ?>">
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