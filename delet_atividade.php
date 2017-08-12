<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	$cod_atividade = $_GET['seq'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){

		$sql = "UPDATE atividade set status = 0 WHERE cod_atividade = $cod_atividade;";

		$deleteAtividade = $con->prepare($sql);
		$deleteAtividade->execute();

		echo "<h1>Atividade excluida com sucesso.</h1>";
		echo "<div id='redirect'><h3>Você será redirecionado em 3 Segundos... </h3></div>";
	?>
		<meta http-equiv="refresh" content=3;url="/template/atividades.php">
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
