<?php
	include "template/topo.php";	
	include "template/menu.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	$sql = "select * from amostra_dados WHERE cod_amostra=".$_GET['seq'];
		$rs = mysql_query($sql, $con);
		if($rs){
			if($valor = mysql_fetch_array($rs)){

				$sql2 = ($valor['amostra']);
				$rs2 = mysql_query($sql2, $con2);

				echo "<h1>Amostra Enviada com Sucesso!</h1>";				

				}
			}
			else{
				echo "Banco não foi encontrado".mysql_error();	
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