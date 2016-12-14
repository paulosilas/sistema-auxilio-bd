<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	$sql = "SELECT cod_resposta, resposta FROM resposta_certa WHERE cod_questao=".$_GET['seq'];
		$rs = mysql_query($sql, $con);
		if($rs){
			if($valor = mysql_fetch_array($rs)){?>
				<form name="altProva" action="update_resposta.php" method=POST>
					<h1> Resposta Cadastrada</h1>
						ID:<input type="text" name="cod_resposta" size=5 
						             value="<?php echo $valor['cod_resposta'];?>" readonly> <br>
						 Resposta:<input type="text" name="resposta" size=40 
							value="<?php echo $valor['resposta'];?>" maxlenght=80> <br>
					<input type="submit" value="Altera">
				</form>
			<?php
			}
			else{
				echo "Não há Respostas Cadastradas";
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