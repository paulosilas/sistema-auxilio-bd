<?php
	include "template/topo.php";	
	include "template/menu.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	$sql = "select * from questao WHERE cod_questao=".$_GET['seq'];
		$rs = mysql_query($sql, $con);
		if($rs){
			if($valor = mysql_fetch_array($rs)){?>
				<form name="altProva" action="update_questao.php" method=POST>
					<h1> Alteração de Dados da Questão</h1>
						ID:<input type="text" name="cod_questao" size=5 
						             value="<?php echo $valor['cod_questao'];?>" readonly> <br>
						 Enunciado:<input type="text" name="enunciado" size=40 
							value="<?php echo $valor['enunciado'];?>" maxlenght=80> <br>
					<input type="submit" value="Altera">
				</form>
			<?php
			}
			else{
				echo "Questão não cadastrado";
			}		
			mysql_free_result($rs);				
		}
		else{
			echo "Erro de Consulta de Questão: ".mysql_error();
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