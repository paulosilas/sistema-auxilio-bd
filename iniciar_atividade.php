<?php
	include "template/topo.php";	
	include "template/menu_aluno.php";
	if($_SESSION['cod_nova_atividade'] == null){
		$_SESSION['cod_nova_atividade'] = $_GET['seq'];
	}
	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "SELECT a.cod_atividade, a.semestre, r.cod_atividade, r.cod_questao, q.cod_questao, q.enunciado FROM atividade as a INNER JOIN questao_e_atividade as r INNER JOIN questao as q WHERE a.cod_atividade = ".$_SESSION['cod_nova_atividade']." AND q.cod_questao = r.cod_questao AND r.cod_atividade =".$_SESSION['cod_nova_atividade'].";";
		$rs = mysql_query($sql, $con);

		$total = mysql_num_rows($rs);
    	  //seta a quantidade de itens por página, neste caso, 2 itens
    	$registros = 1;

    	//calcula o número de páginas arredondando o resultado para cima
    	$numPaginas = ceil($total/$registros);

    	//variavel para calcular o início da visualização com base na página atual
    	$inicio = ($registros*$pagina)-$registros;

    	$sql = "SELECT a.cod_atividade, a.semestre, r.cod_atividade, r.cod_questao, q.cod_questao, q.enunciado FROM atividade as a INNER JOIN questao_e_atividade as r INNER JOIN questao as q WHERE a.cod_atividade =".$_SESSION['cod_nova_atividade']." AND q.cod_questao = r.cod_questao AND r.cod_atividade =".$_SESSION['cod_nova_atividade']." limit $inicio, $registros;";
		$rs = mysql_query($sql, $con);
		//$total = mysql_num_rows($rs);


		if($rs){?>
			<h1> Atividades </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Questão</th>
					</thead>
				</tr>
			<?php
			while ($valor = mysql_fetch_array($rs)){
				$tmp = $valor['cod_questao'];
				echo "<tr>
						<td>".$valor["enunciado"]."</td>
						</tr>";					
			}
			mysql_free_result($rs);
			echo "</table>";

			$_SESSION['respostas_correcao'] = array();

			?>
				<div id="resposta">
					<textarea name="$_SESSION['respostas_correcao'][1]" cols="85" rows="5"><?php echo $_SESSION['respostas_correcao'][1]?></textarea> <br />
				</div>
			<?php

			 //exibe a paginação
				echo "<div id='pag'>";					 
					for($i = 1; $i < $numPaginas + 1; $i++) {
					    $ativo = ($i == $pagina) ? 'numativo' : '';
					    echo "<a href='iniciar_atividade.php?pagina=".$i."' class='numero ".$ativo."'> ".$i." </a>";
					}		     

				echo "</div>";
		}
		else{
			echo "Erro na Consulta de Questões: ".mysql_error();
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