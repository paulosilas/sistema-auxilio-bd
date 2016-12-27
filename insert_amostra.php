<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$amostra = $_POST['amostra'];
	$cod_questao = $_POST['codigo'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "insert into amostra_dados(amostra, cod_questao) ".
			"values ('$amostra','$cod_questao')";
		$rs = mysql_query($sql, $con);
		if($rs){?>
				<meta http-equiv="refresh" content=0;url="http://localhost:8088/template/amostras.php?seq=<?php echo $cod_questao;?>">
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