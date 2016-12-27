<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$cod_amostra = $_GET['seq'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		//$sqlDelete = "SET FOREIGN_KEY_CHECKS = 0;";
		$res = mysql_query($sqlDelete, $con);
		$sql = "DELETE FROM amostra_dados 
		          WHERE cod_amostra = $cod_amostra;";		
		$rs = mysql_query($sql, $con);
		if($rs){
			echo "<h1>Amostra excluida com sucesso.</h1>";
			?>
				<meta http-equiv="refresh" content=0;url="http://localhost:8088/template/atividade_questoes.php?seq=<?php echo $_SESSION['cod_nova_atividade'];?>">
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