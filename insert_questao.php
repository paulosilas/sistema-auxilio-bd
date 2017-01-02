<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$enunciado = $_POST['enunciado'];
	$cod_modelo = $_POST['codigo'];
	$resposta = $_POST['resposta'];
	$cod_tipo = $_POST['cod_tipo'];
	$cod_questao = "";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "insert into questao(enunciado, cod_modelo, cod_tipo) ".
			"values ('$enunciado', '$cod_modelo', '$cod_tipo')";
		$rs = mysql_query($sql, $con);
		if($rs){
			$cod_questao = mysql_insert_id();
			$sql2 = "insert into resposta_certa(resposta, cod_questao) ".
				"values ('$resposta','".$cod_questao."')";
			$rs2 = mysql_query($sql2, $con);

            if(isset($_POST["campo"])) {    
    			// Faz loop pelo array dos campos:
    			foreach($_POST["campo"] as $campo) {
        			$sql3 = "INSERT INTO amostra_dados(amostra, cod_questao)".
        				"VALUES ('".$campo."', '".$cod_questao."')";
        			$rs3 = mysql_query($sql3, $con);
    			}
			}else{
				echo "Você não adicionou nenhuma amostra!";
			}

			if($rs2){
				echo "<h1>Questão Cadastrada com Sucesso</h1>";
				?>
					<meta http-equiv="refresh" content=3;url="http://localhost:8088/template/questoes.php">
				<?php
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