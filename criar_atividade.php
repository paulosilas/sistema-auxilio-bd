<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$tipo = $_POST['codigo']; 
	$con = conecta();
?>        

<div id="content">
	<div id="caixa">
		<?php
			if($con){

				$sql = "INSERT INTO atividade(semestre, cod_professor, cod_tipo, inicio, fim, ano, status) ".
					"values ('".$_SESSION['semestre']."', '".$_SESSION['cod_professor']."', '".$_SESSION['cod_tipo']."', '".$_SESSION['dataInicio']." ".$_SESSION['horarioInicio']."', '".$_SESSION['dataFim']." ".$_SESSION['horarioFim']."', '".date('Y')."', 1)";

				$insereAtividade = $con->prepare($sql);
				$insereAtividade->execute();

				$sqlUltimoID = "SELECT MAX(cod_atividade) as cod_atividade FROM atividade;";
				
				$buscaUltimoID = $con->prepare($sqlUltimoID);
				$buscaUltimoID->execute();

				while($ultimoID = $buscaUltimoID->fetch(PDO::FETCH_ASSOC)){
					$_SESSION['cod_atividade_padrao'] = $ultimoID['cod_atividade'];
				}
				

				foreach($tipo as $k => $v){ 
					$sql2 = "INSERT INTO questao_e_atividade(cod_questao, cod_atividade) ".
					"VALUES ('$v', '".$_SESSION['cod_atividade_padrao']."')";

					$insereQuestaoAtividade = $con->prepare($sql2);
					$insereQuestaoAtividade->execute();
				}

				$sql3 = "SELECT * FROM aluno";

				$buscaAlunos = $con->prepare($sql3);
				$buscaAlunos->execute();

				while($alunos = $buscaAlunos->fetch(PDO::FETCH_ASSOC)){
					$sql4 = "INSERT INTO atividade_e_aluno(cod_atividade, cod_aluno, nota, status_atividade)".
						"VALUES ('".$_SESSION['cod_atividade_padrao']."', '".$alunos['cod_aluno']."', 0, 'Disponivel')";

						$insereAtividadeAluno = $con->prepare($sql4);
						$insereAtividadeAluno->execute();
				}
					
	
				echo "<h1>Atividade Cadastrada com Sucesso</h1>";
				echo "<div id='redirect'><h3>Você será redirecionado em 3 Segundos... </h3></div>";
		?>
				
				<meta http-equiv="refresh" content=3;url="/adqs/atividades.php">
				
				<?php
				
			}else{
				echo "Falha de conexão ao banco de dados: ".mysql_error();
			}
		?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>
