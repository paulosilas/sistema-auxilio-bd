<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	$sql = "select fisico from modelo WHERE cod_modelo=".$_GET['seq'];
		$rs = mysql_query($sql, $con);
		if($rs){
			if($valor = mysql_fetch_array($rs)){
				$pieces = explode(";", $valor['fisico']);
				foreach ($pieces as $piece) {
					$sql2 = $piece;
					$rs2 = mysql_query($sql2, $con);

				}

				echo "<h1> Banco Criado com Sucesso </h1>";
			}
			else{
				echo "Banco não Cadastrado";
			}	
			mysql_free_result($rs);		
		}
		else{
			echo "Erro de Seleção de Banco: ".mysql_error();
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