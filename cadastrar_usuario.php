<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
?>        

<script src="scripts/validarBanco.js"></script>
<script src="scripts/validarUsuario.js"></script>

<div id="content">
	<div id="caixa">
	<?php
		if($con){
	?>
			<h1>Cadastro de Usuário</h1>
			<form name="cadastro_usuario" action="insert_usuario.php" method="post" enctype="multipart/form-data" onSubmit="return enviarDadosUsuario();">
				<div class="nomeUsuario">
					<h4>Nome: <input  class="nomeUsuario" type="text" name="nome" /><br /></h4> 
				</div>
				<h4>Usuário: <input  type="text" name="usuario" /><br /></h4> 
				<h4>Senha: <input  type="password" name="senha" /><br /></h4> 

				<h3>Autoridade:<select name="autoridade"> 
					<option value="1">Professor</option>
					<option value="2">Aluno</option>
				</select></h3>
				
				<div class="botaoAtividade">
					<input type="button" value="Voltar" class="botaoVoltar" onClick="history.go(-1)">
				</div>
				<div class="submitAtividade">
					<input type="submit" value="Cadastrar">
				</div>
			</form>
			
	<?php
		} else{
			echo "Erro de conexão: ".mysql_error();
		}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>