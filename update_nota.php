<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$cod_aluno = $_POST['cod_aluno'];
	$nota = $_POST['nota'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	$sql = "UPDATE atividade_e_aluno as al INNER JOIN aluno AS a INNER JOIN atividade as ati SET  nota = '$nota' WHERE ati.cod_atividade = al.cod_atividade AND al.cod_aluno = $cod_aluno AND a.cod_aluno = $cod_aluno;";		
		$rs = mysql_query($sql, $con);
		if($rs){
			echo "<h1>Nota atualizada com sucesso.</h1>";
		}
		else{
			echo "Erro de alteração: ".mysql_error();
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