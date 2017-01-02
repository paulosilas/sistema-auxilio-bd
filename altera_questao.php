<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
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
					<h3>ID:<input type="text" name="cod_questao" size=5 
						 value="<?php echo $valor['cod_questao'];?>" readonly> </h3>
					 <div id="enunciado">
						<h3>Enunciado:</h3>
						<textarea name="enunciado"><?php echo $valor['enunciado']; ?></textarea> <br />
					</div>
					<div class="botaoAtividade">
						<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
					</div>
					<div class="submitAtividade">
						<input type="submit" value="Alterar">
					</div>
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