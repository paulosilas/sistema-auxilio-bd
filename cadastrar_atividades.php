<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	include "scripts/apenasNumeros.js";
	$con = conecta();
?>        

<script src="scripts/validarAtividade.js"></script>

<div id="content">
	<div id="caixa">
	<?php
		if($con){
	?>
	<form name="cadastrar_atividade" action="selecionar_questoes.php" method=POST onSubmit="return enviardados();">
		<h1> Criação de Atividade </h1>

		<div id="subcaixa">

			<div class="tipoAtividade">
				<h3 class="tipoAtividadeFloat">Tipo de Atividade: <select name="codigo">
		  		<?php
		  			$sql = "SELECT cod_tipo, tipo FROM tipo_atividade";

		  			$buscaTipo = $con->prepare($sql);
					$buscaTipo->execute();

					while($tipos = $buscaTipo->fetch(PDO::FETCH_ASSOC)){
						$cod_tipo = $tipos['cod_tipo'];
						$tipo = $tipos['tipo'];

						echo "<option value='$cod_tipo'>$tipo</option>";
					}				
		  		?>
		  		</select></h3>
		  	</div>
		  
		  	<div class="semestreText">
				<h3>Semestre:<select name="semestre"> 
					<option value="Primeiro">Primeiro</option>
					<option value="Segundo">Segundo</option>
					<option value="Terceiro">Terceiro</option>
					<option value="Quarto">Quarto</option>
					<option value="Quinto">Quinto</option>
					<option value="Sexto">Sexto</option></h3>
				</select></h3>
			</div>

		</div>

		<div id="caixaHorario">
			<h3>Inicio</h3>
		
			<h3>Data:<input type=date  name="dataInicio" min=2016-09-08> </h3>
			<h3>Horario:<input type=time name="horarioInicio" min=00:00 max=24:00></h3>
		</div>
		<br />
		<div id="caixaHorario">
			<h3>Fim</h3>
		
			<h3>Data:<input type=date  name="dataFim" min=2016-09-08></h3>
			<h3>Horario:<input type=time name="horarioFim" min=00:00 max=24:00></h3>
		</div>

		<div class="botaoAtividade">
			<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
		</div>

		<div class="submitAtividade">
			<input type="submit" value="Continuar">
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