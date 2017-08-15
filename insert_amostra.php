<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	$amostra = addslashes($_POST['amostra']);
	$cod_questao = $_POST['codigo'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "INSERT INTO amostra_dados(amostra, cod_questao) VALUES ('$amostra','$cod_questao')";
		$insereAmostra = $con->prepare($sql);
		$insereAmostra->execute();

	?>
		<meta http-equiv="refresh" content=0;url="/adqs/amostras.php?seq=<?php echo $cod_questao;?>">
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
