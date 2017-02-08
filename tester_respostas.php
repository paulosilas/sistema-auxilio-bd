<?php
	include "template/topo.php";	
	include "template/menu_aluno.php";
	$loop = 0;
	$cont = 1;
	$array1 = "";
	$array2 = "";

	//$temp = count($_SESSION['respostas_para_comparar']);
	$temp = 3;
	$totalQuestoes = 3;
	$acertos = 0;
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		while($temp > 0){
			$sql = "SELECT resposta FROM resposta_certa WHERE cod_questao=".$_SESSION['respostas_para_comparar'][$loop];
			$rs = mysql_query($sql, $con);

			while($valor = mysql_fetch_array($rs)){
				$sql2 = $valor['resposta'];										
				$rs2 = mysql_query($sql2, $con2);
				if($rs2){
					while ($valor2 = mysql_fetch_array($rs2)) {
						$array1 = $valor2;
					}
				}
			}

			if($_POST["campo"]){
				$sql3 = $_POST["campo"][$loop];
				$rs3 = mysql_query($sql3, $con2);
				if($rs3){
					while ($valor3 = mysql_fetch_array($rs3)){
						$array2 = $valor3;
					}
				}
			}

			//Verificar se Array 1 é diferente do Array 2
			$resultado = array_diff ($array2 , $array1);

				//se não houverem difenças
				if($resultado == null){
					echo "Questão ".$cont ." Correta! <br />";
					$acertos++;

				//Se houver alguma diferença
				}else{
					echo "Questão ".$cont ." Incorreta! <br />";
				}
				$cont++;


			$loop++;
			$temp--;
		}

		//Fim do Loop

		?>
			<div id="caixaResultado">
				<?php
					$notaAluno = number_format((($acertos / $totalQuestoes) * 100)/10, 1, '.', ',');

					$sqlUpdateNota = "UPDATE atividade_e_aluno SET nota = ".$notaAluno." WHERE cod_aluno = ".$_SESSION['cod_aluno_logado']." AND cod_atividade = ".$_SESSION['cod_nova_atividade']."";
					$rsUpdateNota = mysql_query($sqlUpdateNota, $con);

					echo "<p>Você acertou ".$acertos. " questões de ".$totalQuestoes. "</p>";

					echo "Nota: " .$notaAluno;
				?>
			</div>

			<div class="botaoFinalizarRevisão">
				<input type="button" value="Finalizar" onclick="window.location.href='http://localhost:8088/template/index_aluno.php';">
			</div>
			
			
				
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