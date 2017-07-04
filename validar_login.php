<?php
	include "template/topo.php";	
	$con = conecta();

	$login = isset($_POST['login']) ? $_POST['login'] : '';
	$senhaParaHash = isset($_POST['senha']) ? $_POST['senha'] : '';

	echo "Login: ".$login." Senha: ".$senha."<br />";

	if (empty($login) || empty($senha))
	{
		header('location:index.php'); 
	}

	// cria o hash da senha
	$senha = make_hash($senhaParaHash);
?>        

<div id="content">
	<div id="caixa">
	<?php

	$sql = "SELECT cod_usuario, login, senha, permissao FROM usuario WHERE login = :login AND senha = :senha";
	
	$buscaUsuario = $con->prepare($sql);
	$buscaUsuario->bindParam(':login', $login);
	$buscaUsuario->bindParam(':senha', $senha);

	$buscaUsuario->execute();

	$validaLogin = false;

	while($usuarios = $buscaUsuario->fetch(PDO::FETCH_ASSOC)){
		$validaLogin = true;

			echo "Login: ".$usuarios['login']." Senha: ".$usuarios['senha']."".$usuarios['permissao']."<br />";

			if($usuarios['permissao'] == 1){

				$sqlProfessor = "SELECT cod_professor FROM professor WHERE cod_usuario = ".$usuarios['cod_usuario'];

				$buscaProfessor = $con->prepare($sqlProfessor);
				$buscaProfessor->execute();

				while($professores = $buscaProfessor->fetch(PDO::FETCH_ASSOC)){
					$_SESSION['cod_professor'] = $professores['cod_professor'];

					echo "Codigo do Professor: ".$_SESSION['cod_professor'];
				}

				$_SESSION['login'] = $usuarios['login'];
		    	$_SESSION['senha'] = $usuarios['senha'];
		    	$_SESSION['permissao'] = $usuarios['permissao'];

				header('location:index_professor.php'); 

			}else if($usuarios['permissao'] == 2){

				$sqlAluno = "SELECT cod_aluno FROM aluno WHERE cod_usuario = ".$usuarios['cod_usuario'];

				$buscaAluno = $con->prepare($sqlAluno);
				$buscaAluno->execute();

				while($alunos = $buscaAluno->fetch(PDO::FETCH_ASSOC)){
					$_SESSION['cod_aluno'] = $alunos['cod_aluno'];

					echo "Codigo do Aluno: ".$_SESSION['cod_aluno'];
				}

				$_SESSION['login'] = $usuarios['login'];
		    	$_SESSION['senha'] = $usuarios['senha'];
		    	$_SESSION['permissao'] = $usuarios['permissao'];

				header('location:index_aluno.php'); 

			}else{
				header('location:index.php'); 
			}
		}

		if($validaLogin == false){
			header('location:index.php'); 
		}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>