<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "SELECT * FROM modelo WHERE cod_modelo=".$_GET['seq'];
		$buscaModelo = $con->prepare($sql);
		$buscaModelo->execute();


		while($modelos = $buscaModelo->fetch(PDO::FETCH_ASSOC)){

			$Path = "modelos_logicos/".$modelos['logico'];
			if (file_exists($Path)){
    			unlink($Path);
			} else {
    			echo "Imagem do modelo não existe!";
			}

			$sql3 = "DELETE FROM modelo 
		         WHERE cod_modelo = ".$modelos['cod_modelo'];		
			$deletaModelo = $con->prepare($sql3);
			$deletaModelo->execute();

			echo "<h1>Banco Excluido com Sucesso!</h1>";
			echo "<div id='redirect'><h3>Você será redirecionado em 3 Segundos... </h3></div>";
	?>
			<meta http-equiv="refresh" content=3;url="/adqs/bancos.php">
	<?php
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
