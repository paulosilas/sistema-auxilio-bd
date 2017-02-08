<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
?>        
<script src="scripts/paging.js"></script>

<div id="content">
	<div id="caixa">
	<?php
		if($con){
		$sql = "SELECT q.cod_questao, q.enunciado, q.cod_modelo, r.cod_resposta, r.resposta, r.cod_questao FROM questao as q INNER JOIN resposta_certa as r WHERE q.cod_questao = r.cod_questao;";
		$rs = mysql_query($sql, $con);

		if($rs){?>
	</div>
	<?php
		include "template/filtros.php";
	?>
	<div id="caixa">
			<h1> Questões Cadastrados </h1>
				<table id="tb1" border=1 width=80% align = "center">
					<tr>						
						<th>Enunciado</th>
						<th>Resposta</th>
						<th>Amostras</th>
						<th>Excluir</th>
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
				?>				
				</table>			

				<div id="pag">
					<div id="pageNav"></div>
				    <script>
				        var pager = new Pager('tb1', 5); 
				        pager.init(); 
				        pager.showPageNav('pager', 'pageNav'); 
				        pager.showPage(1);
				    </script>	
				</div>
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