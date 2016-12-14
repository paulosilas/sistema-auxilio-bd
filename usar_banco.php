<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	$sql = "select nome from modelo WHERE cod_modelo=".$_GET['seq'];
		$rs = mysql_query($sql, $con);
		if($rs){
			if($valor = mysql_fetch_array($rs)){

				$_SESSION['nome_db'] = $valor['nome'];
				error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

				$con2 = mysql_connect("localhost", "root", "", TRUE) or die ("A conexão do segundo banco falhou!");
	 			$db2 = mysql_select_db($valor['nome'], $con2);
				
				echo "<h1> Conexão com banco ".$valor['nome']." foi realizada com Sucesso </h1>";
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