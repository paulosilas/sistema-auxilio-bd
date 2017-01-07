<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = mysql_query("SELECT * FROM modelo WHERE cod_modelo=".$_GET['seq']);
 
		// Le todos os dados
		while ($modelo = mysql_fetch_object($sql)) {
		echo "<b>Nome: </b>" . $modelo->nome . "<br />";
		// Exibimos o modelo fisico
		echo "<b>Modelo Lógico</b> <br />";
		echo "<div id='img'><img src='modelos_logicos/".$modelo->logico."' alt='Foto do Modelo' /></div> <br />";
		// Exibimos o modelo logico
		echo "<h3>Modelo Físico:</h3>"; 
		echo "<div id='fisico'>";
			echo $modelo->fisico;
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