<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	$cod_amostra = $_GET['seq'];
?>        

<div id="content">
	<div id="caixa">
		<?php
		if($con){
			$sqlDelete = "SET FOREIGN_KEY_CHECKS = 0;";
			$resetaChave = $con->prepare($sqlDelete);
			$resetaChave->execute();

			$sql = "DELETE FROM amostra_dados WHERE cod_amostra = $cod_amostra;";
			$deleteAmostra = $con->prepare($sql);
			$deleteAmostra->execute();

			$sqlDelete2 = "SET FOREIGN_KEY_CHECKS = 1;";
			$ligaChave = $con->prepare($sqlDelete2);
			$ligaChave->execute();

		?>
			<meta http-equiv="refresh" content=0;url="/adqs/amostras.php?seq=<?php echo $_SESSION['cod_excluir_amostra'];?>">
		<?php
		
		} else{
			echo "Erro de conexão: ".mysql_error();
		}
		?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>
