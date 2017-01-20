<div id="caixaFiltro">
	<h3>Filtrar Questões</h3>
	<div id="filtro">	  
	  <select id="frente">
	    <?php
			$sqlFiltro = "select cod_tipo, tipo from tipo_questao";
			$rsFiltro = mysql_query($sqlFiltro, $con);
			if($rsFiltro){
				echo "<option value='-'>Cetegoria</option>";
				while($filtro = mysql_fetch_array($rsFiltro)){
					$cod_tipo = $filtro['cod_tipo'];
					$tipo = $filtro['tipo'];

					echo "<option value='$tipo'>$tipo</option>";
				}	
				mysql_free_result($rsFiltro);				
			}
		?>
	  </select>
	</div>
	<div id="filtro">	
	  	<select id="dormitorio">
	    <?php
			$sqlFiltro2 = "SELECT cod_modelo, nome FROM modelo";
			$rsFiltro2 = mysql_query($sqlFiltro2, $con);
			if($rsFiltro2){
				echo "<option value='-'>Modelo</option>";
				while($filtro2 = mysql_fetch_array($rsFiltro2)){
					$cod_modelo = $filtro2['cod_modelo'];
					$nome = $filtro2['nome'];

					echo "<option value='$nome'>$nome</option>";
				}	
				mysql_free_result($rsFiltro2);				
			}
		?>
	  	</select>
	</div>
</div>