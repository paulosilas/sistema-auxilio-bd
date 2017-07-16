<?php
	include "template/topo.php";
	$con = conecta();
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
			unset($con2);
			session_destroy();
					 
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
