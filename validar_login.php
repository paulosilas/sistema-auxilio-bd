<?php
	include "template/topo.php";	
	$login = $_POST['login'];
	$senha = $_POST['senha'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "SELECT cod_usuario, login, permissao FROM usuario WHERE login = '$login' AND senha = '$senha'";
		$rs = mysql_query($sql, $con);


		if($rs){
			if (mysql_num_rows ($rs) > 0) {

				$_SESSION['login'] = $login;
    			$_SESSION['senha'] = $senha;

				if($valor = mysql_fetch_assoc($rs)){
					if($valor['permissao'] == 1){

						$sqlProfessor = "SELECT cod_professor FROM professor WHERE cod_usuario = ".$valor['cod_usuario'].";";
						$rsProfessor = mysql_query($sqlProfessor, $con);

						if($valorProf = mysql_fetch_assoc($rsProfessor)){
							$_SESSION['cod_professor'] = $valorProf['cod_professor'];
						}

						$_SESSION['permissao'] = $permissao;

						header('location:index_professor.php');    
					}else{
						$_SESSION['permissao'] = $permissao;
						header('location:index_aluno.php'); 
					}
				}

    			echo "<H1> Login Realizado com sucesso! </h1>";

			}else {
			 //Limpa
				unset ($_SESSION['login']);
				unset ($_SESSION['senha']);

					 
				//Redireciona para a página de autenticação
				header('location:index.php');    
			}

		}
		else{
			echo "Erro de Login: ".mysql_error();
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