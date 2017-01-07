<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
	?>
	<h1>Cadastro de Base de Dados</h1>
	<form name="cadastro_bd" action="insert_bd.php" method="post" enctype="multipart/form-data" >
		<b>Nome:</b> <input type="text" name="nome" /><br />
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