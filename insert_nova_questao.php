<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
	$tipo = $_POST['codigo']; 
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		foreach($tipo as $k => $v){ 
			$sql = "INSERT INTO questao_e_atividade(cod_questao, cod_atividade) ".
			"VALUES ('$v', '".$_SESSION['cod_nova_atividade']."')";

			$insereNovaQuestao = $con->prepare($sql);
			$insereNovaQuestao->execute();
		}
	?>
		<meta http-equiv="refresh" content=0;url="/template/atividade_questoes.php?seq=<?php echo $_SESSION['cod_nova_atividade'];?>">
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