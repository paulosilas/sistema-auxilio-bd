<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
?>        

<div id="content">
	<div id="caixa">
	<?php
		if($con){
			?>
			<div id="index">
				<?php 
				$sql = "SELECT u.cod_usuario, u.login, u.senha, p.nome FROM usuario as u INNER JOIN professor as p WHERE p.cod_usuario = u.cod_usuario and u.login = '".$_SESSION['login']."';";

				$professorLogado = $con->prepare($sql);
				$professorLogado->execute();

				while($professores = $professorLogado->fetch(PDO::FETCH_ASSOC)){
					echo "<H1>Bem Vindo(a) ".$professores['nome']."!</H1>";
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