<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$tipo = $_POST['codigo']; 
	?>        

<div id="content">
	<div id="caixa">
		<?php
			if($con){

				$sql = "insert into atividade(semestre, cod_professor, cod_tipo, inicio, fim) ".
					"values ('".$_SESSION['semestre']."', '".$_SESSION['cod_professor']."', '".$_SESSION['cod_tipo']."', '".$_SESSION['dataInicio']." ".$_SESSION['horarioInicio']."', '".$_SESSION['dataFim']." ".$_SESSION['horarioFim']."')";
				$rs = mysql_query($sql, $con);

				$cod_atividade = mysql_insert_id();

				if($rs){
					foreach($tipo as $k => $v){ 
						$sql2 = "INSERT INTO questao_e_atividade(cod_questao, cod_atividade) ".
						"VALUES ('$v', '$cod_atividade')";
						$rs2 = mysql_query($sql2, $con);
					}
				}else{
					echo "Falha ao inserir nova atividade: ".mysql_error();
				}		
				if($rs2){
					echo "<h1>Atividade Cadastrada com Sucesso</h1>";
				}else{
					echo "Falha ao criar atividade: ".mysql_errno();
				}
				
			}else{
				echo "Falha de conexão ao banco de dados: ".mysql_error();
			}
		?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>