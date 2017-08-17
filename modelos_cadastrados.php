<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
?>        
<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "SELECT * FROM modelo WHERE cod_modelo=".$_GET['seq'].";";

		$buscarBanco = $con->prepare($sql);
		$buscarBanco->execute();
 
		// Le todos os dados
		while($bancos = $buscarBanco->fetch(PDO::FETCH_ASSOC)){

			$imagem = "modelos_logicos/".$bancos['logico'].""; //se for o caminho da foto, ou seja, o campo em que está a imagem
			$tamanho = getimagesize("$imagem");
			$largura = $tamanho["0"];			 

		echo "<b>Nome: </b>" . $bancos['nome'] . "<br />";
		// Exibimos o modelo logico
		echo "<b>Modelo Lógico</b> <br />";
		if($largura > 740 ){
				echo "<a href='#img1'> <div id='img'><img width='740px' src='modelos_logicos/".$bancos['logico']."' alt='Foto do Modelo' /></div> <br /></a>";
				
				?>
					<div id='img'>
						<a href="#_" class="lightbox" id="img1">
	  						<?php echo "<img src='modelos_logicos/".$bancos['logico']."'>"; ?>
						</a>
					</div>

				<?php

			}else{
				echo "<a href='#img1'><div id='img'><img src='modelos_logicos/".$bancos['logico']."' alt='Foto do Modelo' /></div> <br /></a>";
				?>
					<div id='img'>
						<a href="#_" class="lightbox" id="img1">
	  						<?php echo "<img src='modelos_logicos/".$bancos['logico']."'>"; ?>
						</a>
					</div>

				<?php
			}
		// Exibimos o modelo logico
		echo "<h3>Modelo Físico:</h3>"; 
		echo "<div id='fisico'>";
			echo "<pre>";
				echo $bancos['fisico'];
			echo "</pre>"; 
		echo "</div>";		
		}
		?>
		<div class="botaoAtividade">
			<input type="button" value="Voltar" onClick="history.go(-1)">
		</div>
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