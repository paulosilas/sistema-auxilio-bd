<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
?>        

<script src="scripts/validarBanco.js"></script>

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	?>
		<h1>Cadastro de Base de Dados</h1>
		<form name="cadastro_bd" action="insert_bd.php" method="post" enctype="multipart/form-data" onSubmit="return enviarDadosBanco();">
			<h4>Nome: <input  type="text" name="nome" /><br /></h4> 
			
			<div id="enunciado">
				<h3>Modelo Fisico:</h3> <textarea name="fisico"></textarea>
			</div>
			<br />
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