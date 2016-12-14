<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$semestre = $_POST['semestre'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "insert into atividade(semestre, cod_professor) ".
			"values ('$semestre', '".$_SESSION['cod_professor']."')";
		$rs = mysql_query($sql, $con);
		if($rs){
			echo "<h1>Atividade Cadastrada com Sucesso.</h1>";
			?>
				<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=http://localhost:8088/template/atividades.php">
			<?php
		}
		else{
			echo "Erro de inclusão: ".mysql_error();
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