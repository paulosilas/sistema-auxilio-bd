<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT q.cod_questao, q.enunciado, q.cod_modelo, r.cod_resposta, r.resposta, r.cod_questao FROM questao as q INNER JOIN resposta_certa as r WHERE q.cod_questao = r.cod_questao;";
		$rs = mysql_query($sql, $con);
		//conta o total de itens
    	$total = mysql_num_rows($rs);
    	  //seta a quantidade de itens por página, neste caso, 2 itens
    	$registros = 5;
   
    	//calcula o número de páginas arredondando o resultado para cima
    	$numPaginas = ceil($total/$registros);
   
   		//variavel para calcular o início da visualização com base na página atual
    	$inicio = ($registros*$pagina)-$registros;

    	$sql = "SELECT q.cod_questao, q.enunciado, q.cod_modelo, r.cod_resposta, r.resposta, r.cod_questao FROM questao as q INNER JOIN resposta_certa as r WHERE q.cod_questao = r.cod_questao limit $inicio,$registros;";
		$rs = mysql_query($sql, $con);
		$total = mysql_num_rows($rs);

		if($rs){?>
	</div><?php
		include "template/filtros.php";
	?>
	<div id="caixa">
			<br/>
			<h1> Questões Cadastrados </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Enunciado</th>
						<th>Resposta</th>
						<th>Amostras</th>
						<th>Excluir</th>
					</thead>
				</tr>
			<?php
				while ($valor = mysql_fetch_array($rs)){
					echo "<tr>
							<td align='center'><a href='altera_questao.php?seq=".
									$valor["cod_questao"].
							    "'>".$valor["enunciado"]."</a></td>
							<td align='center'><a href='altera_resposta.php?seq=".
									$valor["cod_resposta"].
							    "'>".$valor["resposta"]."</a></td>
							<td align='center'><a href='amostras.php?seq=".
									$valor["cod_questao"].
							    "'><img src='ico/amostra.png' alt='edit' height='32'></a></td>
							<td align='center'><a href='delet_questao.php?seq=".
									$valor["cod_questao"].
							    "'><img src='ico/apagar.png' alt='edit' height='32'></a></td>
						</tr>";					
				}
				mysql_free_result($rs);
				echo "</table>";
				 //exibe a paginação
				echo "<div id='pag'>";
					if($pagina > 1) {
					    echo "<a href='questoes.php?pagina=".($pagina - 1)."' class='controleEsq'>&laquo; Anterior</a>";
					}
					 
					for($i = 1; $i < $numPaginas + 1; $i++) {
					    $ativo = ($i == $pagina) ? 'numativo' : '';
					    echo "<a href='questoes.php?pagina=".$i."' class='numero ".$ativo."'> ".$i." </a>";
					}
					     
					if($pagina < $numPaginas) {
					    echo "<a href='questoes.php?pagina=".($pagina + 1)."' class='controleDir'>Proximo &raquo;</a>";
					}
				echo "</div>";
		}
		else{
			echo "Erro de Consulta de Provas e Questões: ".mysql_error();
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