<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$resposta = $_POST['resposta'];
	$codigo = $_POST['codigo'];
	$array1 = "";
	$array2 = "";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
			$sql = "SELECT resposta FROM resposta_certa WHERE cod_questao=".$codigo;
			$rs = mysql_query($sql, $con);
			if($rs){
				if($valor = mysql_fetch_assoc($rs)){
					$sql2 = $valor['resposta'];										
					$rs2 = mysql_query($sql2, $con2);
					if($rs2){
						while ($valor2 = mysql_fetch_array($rs2)) {
							$array1 = $valor2;
						}
					}
				}
			}
			
			$sql3 = $resposta;
			$rs3 = mysql_query($sql3, $con2);
			if($rs3){
				while ($valor3 = mysql_fetch_array($rs3)){
					$array2 = $valor3;
				}
			}
			$resultado = array_diff ($array2 , $array1);
			if($resultado == null){
				echo "<h3>Resposta Correta!</h3> <br />";
			}else{
				echo "<h3>Resposta Incorreta!</h3>";
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