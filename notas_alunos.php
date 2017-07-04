<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	$_SESSION['cod_questao_update_nota'] = $_GET['seq'];

?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
			$sql = "SELECT ati.cod_atividade, al.cod_atividade, al.cod_aluno, al.nota, a.cod_aluno, a.nome FROM atividade as ati INNER JOIN atividade_e_aluno as al INNER JOIN aluno as a WHERE ati.cod_atividade = ".$_GET['seq']." AND al.cod_atividade = ".$_GET['seq']." AND al.cod_aluno = a.cod_aluno;";

			$buscaNota = $con->prepare($sql);
			$buscaNota->execute();

	?>
			<h1> Atividades Cadastrados </h1>
			<table border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Nome</th>
						<th>Nota</th>
						<th>Alterar</th>
					</thead>
				</tr>
		<?php
			while($notas = $buscaNota->fetch(PDO::FETCH_ASSOC)){
				echo "<tr>
						<td align='center'>".$notas["nome"]."</td>
						<td align='center'>".$notas["nota"]."</td>
						<td align='center'><a href='altera_nota.php?seq=".
								$notas["cod_aluno"].
						    "'><img src='ico/amostra.png' alt='edit' height='32'></a></td>
					</tr>";					
			}
			echo "</table>";
			?>
			<div class="botaoAtividade">
				<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
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