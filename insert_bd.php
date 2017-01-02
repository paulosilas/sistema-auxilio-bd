<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$nome = $_POST['nome'];
	$fisico = $_POST["fisico"];
	$logico = $_FILES['logico'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		// Se a imagem logica estiver sido selecionada
	if (!empty($logico["name"])) {
		
		// Largura máxima em pixels
		$largura = 2000;
		// Altura máxima em pixels
		$altura = 2000;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 1000000;

    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $logico["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($logico["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}

		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($logico["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}

		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $logico["name"], $ext);

        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "modelos_logicos/" . $nome_imagem;

			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($logico["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$sql = mysql_query("INSERT INTO modelo (nome, logico, fisico) VALUES ('".$nome."','".$nome_imagem."', '".$fisico."')");
		
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "<h1>Base de Dados Cadastrada com Sucesso.</h1>";
				?>
					<meta http-equiv="refresh" content=3;url="http://localhost:8088/template/bancos.php">
				<?php
			}
		}
	
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
			}
		}
	}
	} else{
		echo "Erro de conexão: ".mysql_error();
	}
	?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>