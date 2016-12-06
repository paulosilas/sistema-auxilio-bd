<?php
	include "template/topo.php";	
	include "template/menu.php";
	$cod_resposta = $_POST['cod_resposta'];
	$resposta = $_POST['resposta'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	$sql = "UPDATE resposta_certa set 
					resposta = '$resposta'
				WHERE cod_resposta = $cod_resposta;";		
		$rs = mysql_query($sql, $con);
		if($rs){
			echo "<h1>Resposta atualizada com sucesso.</h1>";
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