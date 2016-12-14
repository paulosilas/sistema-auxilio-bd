<?php
	include "template/topo.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
			unset ($_SESSION['login']);
			unset ($_SESSION['senha']);
			unset ($_SESSION['permissao']);

					 
			//Redireciona para a página de autenticação
			header('location:index.php');   

	} else{
		echo "Erro de conexão: ".mysql_error();
	}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>