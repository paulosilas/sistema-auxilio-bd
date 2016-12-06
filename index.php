<?php
	include "template/topo.php";	
	include "template/menu.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
			?>
			<div id="index">
				<h1>Bem Vindo! <?php echo "". $_SESSION['login'] .""?> </h1>
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