<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	$cod_aluno = $_POST['cod_aluno'];
	$nota = $_POST['nota'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "UPDATE atividade_e_aluno as al INNER JOIN aluno AS a INNER JOIN atividade as ati SET  nota = :n WHERE ati.cod_atividade = ".$_SESSION['cod_questao_update_nota']." AND al.cod_atividade = ".$_SESSION['cod_questao_update_nota']." AND al.cod_aluno = $cod_aluno AND a.cod_aluno = $cod_aluno;";		
		$attNota = $con->prepare($sql);
		$attNota->bindParam(":n", $nota);
		$attNota->execute();

		echo "<h1>Nota atualizada com sucesso.</h1>";
		echo "<div id='redirect'><h3>Você será redirecionado em 3 Segundos... </h3></div>";
	?>
		<meta http-equiv="refresh" content=3;url="/template/notas_alunos.php?seq=<?php echo $_SESSION['cod_questao_update_nota'];?>">
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
