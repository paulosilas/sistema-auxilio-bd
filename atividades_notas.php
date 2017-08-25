<?php
	include "template/cabecalho.php";	
	include "template/menu_aluno.php";
	$con = conecta();
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
			$sql = "SELECT al.nota, ta.tipo, al.cod_atividade, a.semestre FROM atividade_e_aluno as al INNER JOIN atividade as a INNER JOIN tipo_atividade as ta WHERE ta.cod_tipo = a.cod_tipo AND a.cod_atividade = al.cod_atividade AND al.cod_aluno =".$_SESSION['cod_aluno_logado'].";";

			$buscarNotas = $con->prepare($sql);
			$buscarNotas->execute();

	?>
			<h1> Notas do Semestre </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Semestre</th>
						<th>Tipo</th>
						<th>Nota</th>
					</thead>
				</tr>
				<?php
				while($notas = $buscarNotas->fetch(PDO::FETCH_ASSOC)){
					echo "<tr>
							<td align='center'>".$notas["semestre"]."</td>
							<td align='center'>".$notas["tipo"]."</td>
							<td align='center'>".$notas["nota"]."</td>
						</tr>";					
				}
				?>
				
				</table>
				<div class="botaoAtividade">
					<input type="button" value="Voltar" onClick="history.go(-1)">
				</div>

				<?php
		}else{
			echo "Erro de conexão: ".mysql_error();
		}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>
