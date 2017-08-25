<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
			?>
			<div id="index">
				<h1>A Página Solicitada Não Existe.</h1>
			</div>
			<?php
		}
		else{
			echo "Erro de conexão: ".mysql_error();
		}
		?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>