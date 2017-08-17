<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	//Contador para enumerar as amostras
	$contador = 1;
?>        
<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "SELECT * FROM amostra_dados WHERE cod_modelo=".$_GET['seq'].";";
		$buscaAmostra = $con->prepare($sql);
		$buscaAmostra->execute();
 
		//Busca todas as amostras
		while($amostras = $buscaAmostra->fetch(PDO::FETCH_ASSOC)){		 

			// Exibimos as amostras de dados
			echo "<h3>Amostra ".$contador.":</h3>"; 
			echo "<div id='fisico'>";
				echo "<pre>";
					echo $amostras['amostra'];
				echo "</pre>"; 
			echo "</div>";	

			$contador++;	
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