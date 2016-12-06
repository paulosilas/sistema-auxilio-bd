<?php
	include "template/topo.php";	
	include "template/menu.php";
	$cod_amostra = $_POST['cod_amostra'];
	$amostra = $_POST['amostra'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	$sql = "UPDATE amostra_dados set 
					amostra = '$amostra'
				WHERE cod_amostra = $cod_amostra;";		
		$rs = mysql_query($sql, $con);
		if($rs){
			echo "<h1>Amostra atualizada com sucesso.</h1>";
		}
		else{
			echo "Erro de alteração: ".mysql_error();
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