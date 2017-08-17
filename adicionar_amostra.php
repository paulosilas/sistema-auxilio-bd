<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
	$_SESSION['cod_modelo_nova_amostra'] = $_GET['seq']
?>        
<!-- Script que verifica se o campo Modelo Fsico e Logico foram preenchidos corretamente (é possivel cadastrar sem amostras) -->
<script src="scripts/validarBanco.js"></script>

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	?>
		<h1>Cadastrar Nova Amostra</h1>
		<form name="cadastrar_amostra" action="insert_nova_amostra.php" method="post" enctype="multipart/form-data">			

			<!-- Caixa para as amostras (mesma formatação do enunciado) -->
			<div id="enunciado">
				<h3>Amostras:</h3> <textarea name="amostras"></textarea>
			</div>

			<div class="botaoAtividade">
				<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
			</div>
			<div class="submitAtividade">
				<input type="submit" value="Cadastrar">
			</div>
		</form>
	
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