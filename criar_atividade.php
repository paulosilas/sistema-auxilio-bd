<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$tipo = $_POST['codigo']; 
	?>        

<div id="content">
	<div id="caixa">
		<?php
			if($con){

				$sql = "insert into atividade(semestre, cod_professor, cod_tipo, inicio, fim) ".
					"values ('".$_SESSION['semestre']."', '".$_SESSION['cod_professor']."', '".$_SESSION['cod_tipo']."', '".$_SESSION['dataInicio']." ".$_SESSION['horarioInicio']."', '".$_SESSION['dataFim']." ".$_SESSION['horarioFim']."')";
				$rs = mysql_query($sql, $con);

				$sqlUltimoID = "SELECT MAX(cod_atividade) FROM atividade;";
				$rsUltimoID = mysql_query($sqlUltimoID, $con);

				if($rsUltimoID){
						while ($teste = mysql_fetch_array($rsUltimoID)){
							$_SESSION['cod_atividade_padrao'] = $teste[0];
					}
				}

				if($rs){
					foreach($tipo as $k => $v){ 
						$sql2 = "INSERT INTO questao_e_atividade(cod_questao, cod_atividade) ".
						"VALUES ('$v', '".$_SESSION['cod_atividade_padrao']."')";
						$rs2 = mysql_query($sql2, $con);
					}

					$sql3 = "SELECT * FROM aluno";
					$rs3 = mysql_query($sql3, $con);

					if($rs3){
						while ($valor = mysql_fetch_array($rs3)){
							$sql4 = "INSERT INTO atividade_e_aluno(cod_atividade, cod_aluno, nota)".
								"VALUES ('$cod_atividade', '".$valor['cod_aluno']."', 0)";
								$rs4 = mysql_query($sql4, $con);
						}
					}else{
						echo "Falha no relacionamento entre atividade e aluno".mysql_error();
					}
					
				}else{
					echo "Falha ao inserir nova atividade: ".mysql_error();
				}		
				if($rs2){
					echo "<h1>Atividade Cadastrada com Sucesso</h1>";
					?>
						<meta http-equiv="refresh" content=3;url="http://localhost:8088/template/atividades.php">
					<?php

				}else{
					echo "Falha ao criar atividade: ".mysql_errno();
				}
				
			}else{
				echo "Falha de conexão ao banco de dados: ".mysql_error();
			}
		?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>