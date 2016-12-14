<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
	?>
	<form name="cadastrar_atividade" action="insert_atividade.php" method=POST >
		<h1> Criação de Atividade </h1>
		<b>Semestre:</b><input type="text" name="semestre" size=5 maxlenght=11> <br />
	<input type="submit" value="Cadastrar">
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