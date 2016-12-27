<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
	$sql = "SELECT ati.cod_atividade, al.cod_atividade, al.cod_aluno, al.nota, a.cod_aluno, a.nome FROM atividade as ati INNER JOIN atividade_e_aluno as al INNER JOIN aluno as a WHERE ati.cod_atividade = al.cod_atividade AND al.cod_aluno = ".$_GET['seq']." AND a.cod_aluno = ".$_GET['seq'].";";

		$rs = mysql_query($sql, $con);
		if($rs){
			if($valor = mysql_fetch_array($rs)){?>
				<form name="altNota" action="update_nota.php" method=POST>
					<h1> Alteração de Nota</h1>
					<input type="hidden" name="cod_aluno" value="<?php echo $valor['cod_aluno'];?>" />
					 <div id="Nota">
						<h3>Nota:
						<input type="text" name="nota" value="<?php echo $valor['nota']; ?>"> </h3> <br />
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