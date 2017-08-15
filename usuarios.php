<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
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
		$sql = "SELECT login, permissao FROM usuario";
		$buscarUsuario = $con->prepare($sql);
		$buscarUsuario->execute();

	?>
	</div>
		<?php
			include "template/filtroUsuario.php";
		?>

	<div id="caixa">
			<h1> Usuários Cadastrados </h1>
			<table id="tb1" border=1 width=80% align = "center">
				<tr>
					<thead>
						<th>Nível</th>
						<th>Usuario</th>
					</thead>
				</tr>
			<?php
				while($usuarios = $buscarUsuario->fetch(PDO::FETCH_ASSOC)){

					if($usuarios["permissao"] == 1){
						echo "<tr class='produto'>
							<td class='primeiro' align='center'>Professor</td>
							<td align='center'>".$usuarios["login"]."</td>
						</tr>";
					}else{
						echo "<tr class='produto'>
							<td class='primeiro' align='center'>Aluno</td>
							<td align='center'>".$usuarios["login"]."</td>
						</tr>";
					}
										
				}
				echo "</table>";
				?>
				<!-- Inicio da Paginação-->
				<div id="pag">
				<div id="pageNav"></div>
					<script>
					    var pager = new Pager('tb1',10); 
					    pager.init(); 
					    pager.showPageNav('pager', 'pageNav'); 
					    pager.showPage(1);
					</script>	
				</div>
				<!-- Fim da Paginação-->
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