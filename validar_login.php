<?php
	include "template/topo.php";	
	include "template/menu.php";
	$login = $_POST['login'];
	$senha = $_POST['senha'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "SELECT login, senha FROM usuario WHERE login = '$login' AND senha = '$senha'";
		$rs = mysql_query($sql, $con);

		if($rs){
			if (mysql_num_rows ($rs) > 0) {
    		// session_start inicia a sessão
     
    			$_SESSION['login'] = $login;
    			$_SESSION['senha'] = $senha;

    			echo "<H1> Login Realizado com sucesso! </h1>";
			}else {
			 //Limpa
				unset ($_SESSION['login']);
				unset ($_SESSION['senha']);
					 
				//Redireciona para a página de autenticação
				header('location:login.php');    
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