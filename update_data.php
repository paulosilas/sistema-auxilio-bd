<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	$dataInicio = $_POST['dataInicio']; 
	$horaInicio = $_POST['horarioInicio']; 
	$dataFim = $_POST['dataFim']; 
	$horaFim = $_POST['horarioFim']; 
?>        

<div id="content">
	<div id="caixa">
		<?php
			if($con){

				$sql = "UPDATE atividade set inicio = '$dataInicio $horaInicio', fim = '$dataFim $horaFim' WHERE cod_atividade = '".$_SESSION['cod_altera_data']."';";		
				$attData = $con->prepare($sql);
				$attData->execute();							
	
				//Destroi variavel com cod da atividade para ser alterado
				unset($_SESSION['cod_altera_data']);					

				echo "<h1>Atividade Cadastrada com Sucesso</h1>";
				echo "<div id='redirect'><h3>Você será redirecionado em 3 Segundos... </h3></div>";

		?>
				
				<meta http-equiv="refresh" content=3;url="/template/atividades.php">
				
				<?php
				
			}else{
				echo "Falha de conexão ao banco de dados: ".mysql_error();
			}
		?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>