<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
			$sql = "select * from amostra_dados WHERE cod_amostra=".$_GET['seq'];
			$rs = mysql_query($sql, $con);
			if($rs){
				if($valor = mysql_fetch_array($rs)){?>
					<form name="altAmostra" action="update_amostra.php" method=POST>
						<h1> Alteração de Dados de Amostra</h1>
							<h3>ID:<input type="text" name="cod_amostra" size=5 
							             value="<?php echo $valor['cod_amostra'];?>" readonly> </h3>
							 <div id="enunciado">
								<h3>Amostra:</h3>
								<textarea name="amostra"><?php echo $valor['amostra']; ?></textarea> <br />
							</div>
						<div class="editarAmostra">
							<input type="submit" value="Alterar">
						</div>
					</form>
				<?php
				}
				else{
					echo "Amostra não cadastrada";
				}		
				mysql_free_result($rs);				
			}
			else{
				echo "Erro de Consulta de Questão: ".mysql_error();
			}
		}
		else{
			echo "Erro de conexão: ".mysql_error();
		}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>