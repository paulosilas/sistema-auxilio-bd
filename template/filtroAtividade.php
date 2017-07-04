<div id="caixaFiltro">
	<h3>Filtrar Atividades</h3>
	<div id="filtro">	  
	  <select id="primeiro">
	    <?php
			$sqlFiltro = "SELECT DISTINCT ano FROM atividade";

			$filtroAtividade = $con->prepare($sqlFiltro);
			$filtroAtividade->execute();

			echo "<option value='-'>Ano</option>";
			while($anoAtividade = $filtroAtividade->fetch(PDO::FETCH_ASSOC)){
				$cod_atividade = $anoAtividade['cod_atividade'];
				$ano = $anoAtividade['ano'];

				echo "<option value='$ano'>$ano</option>";
			}				

		?>
	  </select>
	</div>
	<div id="filtro">	
	  	<select id="segundo">
	    <?php
			echo "<option value='-'>Semestre</option>";
			echo "<option value='Primeiro'>Primeiro</option>";
			echo "<option value='Segundo'>Segundo</option>";
			echo "<option value='Terceiro'>Terceiro</option>";
			echo "<option value='Quarto'>Quarto</option>";
			echo "<option value='Quinto'>Quinto</option>";
			echo "<option value='Sexto'>Sexto</option>";			
		?>
	  	</select>
	</div>
</div>