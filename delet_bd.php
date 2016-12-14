<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "select * from modelo WHERE cod_modelo=".$_GET['seq'];
		$rs = mysql_query($sql, $con);

		if($rs){
			if($valor = mysql_fetch_array($rs)){

				$Path = "modelos_logicos/".$valor['logico'];
				if (file_exists($Path)){
    				unlink($Path);
				} else {
    				echo "Imagem do modelo não existe!";
				}

				$sql2 = "DROP DATABASE ". $valor['nome'];
				$rs2 = mysql_query($sql2, $con);

				$sql3 = "DELETE FROM modelo 
		          WHERE cod_modelo = ".$valor['cod_modelo'];		
				$rs3 = mysql_query($sql3, $con);

				echo "<h1>Banco Excluido com Sucesso!</h1>";
			}
		}
		else{
			echo "Banco não selecionado! : ".mysql_error();
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