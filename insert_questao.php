<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$num_questao = $_POST['num_questao'];
	$enunciado = $_POST['enunciado'];
	$cod_modelo = $_POST['codigo'];
	$cod_atividade = $_POST['cod_atividade'];
	$resposta = $_POST['resposta'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "insert into questao(num_questao, enunciado, cod_modelo, cod_atividade) ".
			"values ('$num_questao', '$enunciado', '$cod_modelo', '$cod_atividade')";
		$rs = mysql_query($sql, $con);
		if($rs){
			$sql2 = "insert into resposta_certa(resposta, cod_questao) ".
				"values ('$resposta','".mysql_insert_id()."')";
			$rs2 = mysql_query($sql2, $con);

			if($rs2){
				echo "<h1>Questão Cadastrada com Sucesso.</h1>";
				//echo "Last inserted record has id". mysql_insert_id()."";
			}else{
				echo "Erro de inclusão na Resposta: ".mysql_error();
			}
			
		}
		else{
			echo "Erro de inclusão na Questão: ".mysql_error();
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