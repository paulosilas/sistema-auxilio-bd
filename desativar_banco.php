<?php
	include "template/topo.php";	
	include "template/menu.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "select nome from modelo WHERE cod_modelo=".$_GET['seq'];
		$rs = mysql_query($sql, $con);
		if($rs){
			if($valor = mysql_fetch_array($rs)){

				mysql_close($con2);
				$_SESSION['nome_db'] = "";
				
				echo "<h1> Conexão com banco ".$valor['nome']." foi desativada com Sucesso </h1>";				
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