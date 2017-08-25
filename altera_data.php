<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	include "scripts/apenasNumeros.js";
	$con = conecta();

	$_SESSION['cod_altera_data'] = $_GET['seq'];
?>        

<script src="scripts/validarAtividade.js"></script>

<div id="content">
	<div id="caixa">
	<?php
		if($con){

			$sql = "SELECT inicio, fim FROM atividade WHERE cod_atividade =".$_GET['seq'];
			$buscarData = $con->prepare($sql);
			$buscarData->execute();

			while($datas = $buscarData->fetch(PDO::FETCH_ASSOC)){?>
				<form name="atualizar_atividade" action="update_data.php" method=POST onSubmit="return enviardados();">
					<h1> Atualização de Data e Hora </h1>

					<div id="caixaHorario">
						<h3>Inicio</h3>
					
						<h3>Data:<input type=date name="dataInicio" value="<?php echo date('Y-m-d', strtotime($datas['inicio'])); ?>" min=2016-09-08> </h3>
						<h3>Horario:<input type=time name="horarioInicio" value="<?php echo date('H:i', strtotime($datas['inicio'])); ?>" min=00:00 max=24:00></h3>
					</div>
					<br />
					<div id="caixaHorario">
						<h3>Fim</h3>
					
						<h3>Data:<input type=date  name="dataFim" value="<?php echo date('Y-m-d', strtotime($datas['fim'])); ?>" min=2016-09-08></h3>
						<h3>Horario:<input type=time name="horarioFim" value="<?php echo date('H:i', strtotime($datas['fim'])); ?>" min=00:00 max=24:00></h3>
					</div>

					<div class="botaoAtividade">
						<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
					</div>

					<div class="submitAtividade">
						<input type="submit" value="Confirmar">
					</div>
				</form>

	<?php
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