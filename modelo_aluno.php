<?php
	include "template/cabecalho.php";
	$con = conecta();
?>        

<div id="content_index">
	<div id="caixa">
	<?php
	if($con){
		$sql = "SELECT * FROM modelo WHERE cod_modelo=".$_SESSION['cod_modelo_atual'].";";
		$buscaModelo = $con->prepare($sql);
		$buscaModelo->execute();
 
		// Le todos os dados
		while($modelos = $buscaModelo->fetch(PDO::FETCH_ASSOC)){

			$imagem = "modelos_logicos/".$modelos['logico'].""; //se for o caminho da foto, ou seja, o campo em que está a imagem
			$tamanho = getimagesize("$imagem");
			$largura = $tamanho["0"];			 

		echo "<div id='espacamento'><b>Nome: </b>" . $modelos['nome'] . "</div>";
		// Exibimos o modelo logico
		echo "<div id='espacamento'><b>Modelo Lógico</b> </div>";
		if($largura > 740 ){
				echo "<a href='#img1'> <div id='img'><img width='740px' src='modelos_logicos/".$modelos['logico']."' alt='Foto do Modelo' /></div> <br /></a>";
				
				?>
					<div id='img'>
						<a href="#_" class="lightbox" id="img1">
	  						<?php echo "<img src='modelos_logicos/".$modelos['logico']."'>"; ?>
						</a>
					</div>

				<?php

			}else{
				echo "<a href='#img1'><div id='img'><img src='modelos_logicos/".$modelos['logico']."' alt='Foto do Modelo' /></div> <br /></a>";
				?>
					<div id='img'>
						<a href="#_" class="lightbox" id="img1">
	  						<?php echo "<img src='modelos_logicos/".$modelos['logico']."'>"; ?>
						</a>
					</div>

				<?php
			}
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
