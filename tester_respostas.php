<?php
	include "template/topo.php";	
	$con = conecta();
	$con2 = conectaSegundo();

	$loop = 0;
	$cont = 1;

	$temp = $_SESSION['num_questoes']; 
	$totalQuestoes = $temp;
	$acertos = 0;

?>        

<div id="content_index">
	<div id="caixa">
	<?php
	if($con){

		//Atualiza o status para finalizado
		$sqlUpdate = "UPDATE atividade_e_aluno SET status_atividade = 'Finalizado' WHERE cod_atividade = ".$_SESSION['cod_nova_atividade']." AND cod_aluno = ".$_SESSION['cod_aluno_logado'].";";
		$attStatus = $con->prepare($sqlUpdate);
		$attStatus->execute();
		

		while($temp > 0){
			$array1 = array();
			$array2 = array();

			$sqlAmostra = "SELECT amostra FROM amostra_dados WHERE cod_questao=".$_SESSION['respostas_para_comparar'][$loop];
			$buscaAmostra = $con->prepare($sqlAmostra);
			$buscaAmostra->execute();

			//Executa as amostras das questões
			while($amostras = $buscaAmostra->fetch(PDO::FETCH_ASSOC)){
				$sqlExeAmostra = $amostras['amostra'];

				$executaAmostra = $con2->prepare($sqlExeAmostra);
				$executaAmostra->execute();
			}			

			
			//PROBLEMA ABAIXO POSSIVELMENTE SOLUCIOADO

			//Buscas as respostas gravadas no banco de dados
			$sql = "SELECT resposta FROM resposta_certa WHERE cod_questao=".$_SESSION['respostas_para_comparar'][$loop];
			$buscaResposta = $con->prepare($sql);
			$buscaResposta->execute();

			while($respostas = $buscaResposta->fetch(PDO::FETCH_ASSOC)){
				$sql2 = $respostas['resposta'];	

				$executaResProf = $con2->prepare($sql2);
				$executaResProf->execute();

				
				$linha = $executaResProf->fetchAll(PDO::FETCH_ASSOC);

				foreach ($linha as $listar) {
					array_push($array1, $listar);
				}				

			}

			//Executa as respostas dadas pelo aluno
			$sql3 = $_POST["campo"][$loop];

			$executaRespostaAluno = $con2->prepare($sql3);
			$executaRespostaAluno->execute();

			$linha2 = $executaRespostaAluno->fetchAll();

			foreach ($linha2 as $listar2) {
				array_push($array2, $listar2);
			}

			$teste1 = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($array1)), 0);
			$teste2 = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($array2)), 0);

			
			//PROBLEMA ACIMA POSSIVELMENTE SOLUCIOADO

			if($teste2 != null and $teste1 != null){

				//Faz a comparação entre as respostas
				$resultado = array_merge(array_diff($teste1, $teste2), array_diff($teste2, $teste1));


				//se não houverem difenças
				if($resultado == null){
					//echo "Questão ".$cont ." Correta! <br /><br />";
					$acertos++;

				//Se houver alguma diferença
				}else{
					//echo "Questão ".$cont ." Incorreta! <br /><br />";
				}
				$cont++;


			}else{
				$cont++;
			}

			$loop++;
			$temp--;
		}

		//Fim do Loop

		?>
			<br />
			<div id="caixaResultado">
				<?php
					$notaAluno = number_format((($acertos / $totalQuestoes) * 100)/10, 1, '.', ',');

					$sqlUpdateNota = "UPDATE atividade_e_aluno SET nota = ".$notaAluno." WHERE cod_aluno = ".$_SESSION['cod_aluno_logado']." AND cod_atividade = ".$_SESSION['cod_nova_atividade']."";
					$attNota = $con->prepare($sqlUpdateNota);
					$attNota->execute();

					echo "<p><b>Você acertou</b> ".$acertos. " <b> de</b> ".$totalQuestoes. " <b>questões</b></p>";

					echo "<b>Nota:</b> " .$notaAluno."</br>";
				?>
				<div class="botaoRevisar">
					<input type="button" value="Revisar" onclick="window.location.href='http://localhost:8088/template/revisar_prova.php';">
				</div>
			</div>

			<div class="botaoFinalizarRevisao">
				<input type="button" value="Finalizar" onclick="window.location.href='http://localhost:8088/template/index_aluno.php';">
			</div>
		<?php

		//Fechar a conexão e resetar o nome do segundo Banco
		unset($con2);
		$_SESSION['nome_db'] = "";


	} else{
		echo "Erro de conexão: ".mysql_error();
	}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>