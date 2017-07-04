<div id="caixaFiltro">
	<h3>Filtrar Questões</h3>
	<div id="filtro">	  
	  <select id="primeiro">
	    <?php
			$sqlFiltro = "SELECT cod_tipo, tipo FROM tipo_questao";

			$filtroQuestao = $con->prepare($sqlFiltro);
			$filtroQuestao->execute();

			echo "<option value='-'>Cetegoria</option>";
			while($tipoQuestao = $filtroQuestao->fetch(PDO::FETCH_ASSOC)){
				$cod_tipo = $tipoQuestao['cod_tipo'];
				$tipo = $tipoQuestao['tipo'];

				echo "<option value='$tipo'>$tipo</option>";
			}			
		?>
	  </select>
	</div>
	<div id="filtro">	
	  	<select id="segundo">
	    <?php
			$sqlFiltro2 = "SELECT cod_modelo, nome FROM modelo";
			
			$filtroModelo = $con->prepare($sqlFiltro2);
			$filtroModelo->execute();

			echo "<option value='-'>Modelo</option>";
			while($modelo = $filtroModelo->fetch(PDO::FETCH_ASSOC)){
				$cod_modelo = $modelo['cod_modelo'];
				$nome = $modelo['nome'];

				echo "<option value='$nome'>$nome</option>";
			}	
		?>
	  	</select>
	</div>
</div>