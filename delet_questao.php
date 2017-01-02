<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$cod_questao = $_GET['seq'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sqlDelete = "SET FOREIGN_KEY_CHECKS=0;";
		$res = mysql_query($sqlDelete, $con);
		$sql = "DELETE FROM questao 
		          WHERE cod_questao = $cod_questao;";		
		$rs = mysql_query($sql, $con);
		$sqlDelete2 = "SET FOREIGN_KEY_CHECKS=1;";
		$res2 = mysql_query($sqlDelete2, $con);
		if($rs){
			echo "<h1>Questão excluida com sucesso.</h1>";
			?>
					<meta http-equiv="refresh" content=3;url="http://localhost:8088/template/questoes.php">
				<?php
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