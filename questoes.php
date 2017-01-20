<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?> 

<!-- Inicio dos Scripts -->

<script src="scripts/paging.js"></script>
<script src="scripts/jquery-1.7.2.min.js"></script>
<script src="scripts/filtro.js"></script>

<!-- Fim dos Scripts -->

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT q.cod_questao, q.enunciado, q.cod_modelo, q.cod_tipo, r.cod_resposta, r.resposta, r.cod_questao, tp.cod_tipo, tp.tipo, m.cod_modelo, m.nome FROM questao as q INNER JOIN resposta_certa as r INNER JOIN tipo_questao as tp INNER JOIN  modelo as m WHERE q.cod_questao = r.cod_questao and q.cod_tipo = tp.cod_tipo and q.cod_modelo = m.cod_modelo;";
		$rs = mysql_query($sql, $con);

		if($rs){?>
	</div>


<!-- Inicio do Filtro -->
	<?php
		include "template/filtros.php";
	?>

<!-- Fim do Filtro -->

<div id="caixa">
	<h1> Questões Cadastrados </h1>

	<!-- Inicio da Lista -->
	<table id="tb1" border=1 width=80% align = "center">
		<div id="produtos">
			<tr class="produto">
			  	<th>Categoria</th>
				<th>Enunciado</td>
				<th>Resposta</td>
				<th>Amostras</td>
				<th>Excluir</td>
		 	</tr>

			<?php
				while ($valor = mysql_fetch_array($rs)){
					echo "<tr class='produto'>
							<td class='frente' align='center'>".$valor["tipo"]."</td>
							<td class='dormitorio' style='display:none'>".$valor["nome"]."</td>
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
			?>	
		</div>
	</table>
	<!-- Fim da Lista -->

	<!-- Inicio da Paginação-->
	<div id="pag">
	<div id="pageNav"></div>
		<script>
		    var pager = new Pager('tb1',5); 
		    pager.init(); 
		    pager.showPageNav('pager', 'pageNav'); 
		    pager.showPage(1);
		</script>	
	</div>
	<!-- Fim da Paginação-->

	<?php
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