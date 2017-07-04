<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	$usuario = $_POST['usuario'];

	$senha = make_hash($_POST['senha']);

	$autoridade = $_POST['autoridade'];
	$nome = $_POST['nome'];
	$cod_usuario = "";
	$cod_aluno = "";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){

		if($usuario != null){
			$sql = "INSERT INTO usuario(login, senha, permissao) VALUES (:u, :s, :a)";
			$insereUsuario = $con->prepare($sql);
			$insereUsuario->bindParam(":u", $usuario);
			$insereUsuario->bindParam(":s", $senha);
			$insereUsuario->bindParam(":a", $autoridade);
			$insereUsuario->execute();

			//Busca o ID do ultimo usuario inserido
			$cod_usuario = $con->lastInsertId();

		}
		
		if($autoridade == 1){
			$sqlProf = "INSERT INTO professor(nome, cod_usuario) VALUES (:n, '$cod_usuario')";
			$insereProfessor = $con->prepare($sqlProf);
			$insereProfessor->bindParam(":n", $nome);
			$insereProfessor->execute();
		}else{
			$sqlAluno = "INSERT INTO aluno(nome, cod_usuario) VALUES ('$nome', '$cod_usuario')";
			$insereAluno = $con->prepare($sqlAluno);
			$insereAluno->bindParam(":n", $nome);
			$insereAluno->execute();

			//Busca o ID do ultimo aluno inserido
			$cod_aluno = $con->lastInsertId();

			$sqlAtividade = "SELECT cod_atividade FROM atividade;";
			$buscarAtividade = $con->prepare($sqlAtividade);
			$buscarAtividade->execute();

			while($atividades = $buscarAtividade->fetch(PDO::FETCH_ASSOC)){
				$sqlAtiAluno = "INSERT INTO atividade_e_aluno(cod_atividade, cod_aluno, nota, status_atividade)".
								"VALUES ('".$atividades['cod_atividade']."', '$cod_aluno', 0, 'Disponivel')";
				$insereAtAl = $con->prepare($sqlAtiAluno);
				$insereAtAl->execute();
			}

		}

		echo "<h1>Usuário Cadastrado com Sucesso</h1>";
		echo "<div id='redirect'><h3>Você será redirecionado em 3 Segundos... </h3></div>";
		?>
			<meta http-equiv="refresh" content=3;url="http://localhost:8088/template/index_professor.php">
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