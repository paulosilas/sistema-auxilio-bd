	<div id="caixaFiltro">
		<form name="filtrar_questoes" action="questoes_filtradas.php" method=POST >
			<h3>Filtrar Questões</h3>
			<div class="styled-select">
				<select name="cod_tipo">
					<?php
			  			$sqlFiltro = "select cod_tipo, tipo from tipo_questao";
			  			$rsFiltro = mysql_query($sqlFiltro, $con);
			  			if($rsFiltro){
			  			echo "<option value=0>Cetegoria</option>";
						while($filtro = mysql_fetch_array($rsFiltro)){
							$cod_tipo = $filtro['cod_tipo'];
							$tipo = $filtro['tipo'];

							echo "<option value='$cod_tipo'>$tipo</option>";
						}	
						mysql_free_result($rsFiltro);				
					}
					else{
						echo "Não foi possivel selecionar a categoria: ".mysql_error();
					}
			  		?>
			   </select>
			</div>
			<div class="styled-select">
				<select name="cod_modelo">
					<?php
			  			$sqlFiltro2 = "SELECT cod_modelo, nome FROM modelo";
			  			$rsFiltro2 = mysql_query($sqlFiltro2, $con);
			  			if($rsFiltro2){
			  			echo "<option value=0>Modelo</option>";
						while($filtro2 = mysql_fetch_array($rsFiltro2)){
							$cod_modelo = $filtro2['cod_modelo'];
							$nome = $filtro2['nome'];

							echo "<option value='$cod_modelo'>$nome</option>";
						}	
						mysql_free_result($rsFiltro2);				
					}
					else{
						echo "Não foi possivel selecionar o modelo: ".mysql_error();
					}
			  		?>
			   </select>
			</div>
				<input type="submit" value="Pesquisar">
		</form>
	</div>