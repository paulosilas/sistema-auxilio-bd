<?php
	include "template/topo.php";	
	include "template/menu_aluno.php";
	$con = conecta();
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
			?>
			<div id="index">
				<?php 
				$sql = "SELECT u.cod_usuario, u.login, u.senha, a.nome, a.cod_aluno FROM usuario as u INNER JOIN aluno as a WHERE a.cod_usuario = u.cod_usuario and u.login = '".$_SESSION['login']."';";
				
				$alunoLogado = $con->prepare($sql);
				$alunoLogado->execute();

				while($alunos = $alunoLogado->fetch(PDO::FETCH_ASSOC)){
					echo "<H1>Bem Vindo(a) ".$alunos['nome']."!</H1>";
					$_SESSION['cod_aluno_logado'] = $alunos['cod_aluno'];
				}
				?>
			</div>
			<?php
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