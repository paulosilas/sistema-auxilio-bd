<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
?>        
<!-- Script que verifica se o campo Modelo Fsico e Logico foram preenchidos corretamente (é possivel cadastrar sem amostras) -->
<script src="scripts/validarBanco.js"></script>

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	?>
		<h1>Cadastro de Base de Dados</h1>
		<form name="cadastro_bd" action="insert_bd.php" method="post" enctype="multipart/form-data" onSubmit="return enviarDadosBanco();">
			<h4>Nome: <input  type="text" name="nome" /><br /></h4> 
			
			<!-- Caixa para o modelo fisico (mesma formatação do enunciado) -->
			<div id="enunciado">
				<h3>Modelo Fisico:</h3> <textarea name="fisico"></textarea>
			</div>

			<!-- Caixa para as amostras (mesma formatação do enunciado) -->
			<div id="enunciado">
				<h3>Amostras:</h3> <textarea name="amostras"></textarea>
			</div>

			<br />

			<!-- Campo para inserir o modelo logico do banco cadastrado -->
			<input type="file" name="logico" />
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