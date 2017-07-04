<?php
	include "template/topo2.php";
	$con = conecta();

?>        
<div id="content_index">
	<div id="caixa">
	<?php
		if($con){
			?>
			<div id="caixa_login">
				<form name="validar_login" action="validar_login.php" method=POST >
					<label>Usuario:</label><input type="text" name="login"> <br />
					<label>Senha:</label> <input type="password" name="senha">
					<input type="submit" value="Entrar" id="entrar" name="entrar">
				</form>
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