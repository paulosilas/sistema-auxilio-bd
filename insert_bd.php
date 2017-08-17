<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();

	$nome = $_POST['nome'];
	$fisico = $_POST["fisico"];
	$logico = $_FILES['logico'];
	$amostra = $_POST['amostras'];
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

			
				// Pega extensão da imagem
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $logico["name"], $ext);

	        	// Gera um nome único para a imagem
	        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

	        	// Caminho de onde ficará a imagem
	        	$caminho_imagem = "modelos_logicos/" . $nome_imagem;

				// Faz o upload da imagem para seu respectivo caminho
				move_uploaded_file($logico["tmp_name"], $caminho_imagem);
			
				// Insere os dados no banco
				$sql = "INSERT INTO modelo (nome, logico, fisico) VALUES (:n,'".$nome_imagem."', :f)";
				$insereModelo = $con->prepare($sql);
				$insereModelo->bindParam(":f", $fisico);
				$insereModelo->bindParam(":n", $nome);
				$insereModelo->execute();

				//Pega o ID do ultimo banco cadastrado
				$sqlUltimoID = "SELECT MAX(cod_modelo) as cod_modelo FROM modelo;";
				$buscaUltimoID = $con->prepare($sqlUltimoID);
				$buscaUltimoID->execute();

				while($modelos = $buscaUltimoID->fetch(PDO::FETCH_ASSOC)){

					//Verifica se existe uma amostra
					if($amostra != "" and $amostra != null){
						//Cadastra a amostra usando o ID do ultimo banco cadastrado como chave estrangeira
						$sqlAsmotra = "INSERT INTO amostra_dados (amostra, cod_modelo) VALUES (:am,'".$modelos['cod_modelo']."')";
						$insereAmostra = $con->prepare($sqlAsmotra);
						$insereAmostra->bindParam(":am", $amostra);
						$insereAmostra->execute();
					}

					

					$_SESSION['cod_modelo_criar'] = $modelos['cod_modelo'];

					$sqlCriarBD = "SELECT fisico FROM modelo WHERE cod_modelo=".$_SESSION['cod_modelo_criar'];
					$buscarFisico = $con->prepare($sqlCriarBD);
					$buscarFisico->execute();
					
					try {
						while($bancoCriar = $buscarFisico->fetch(PDO::FETCH_ASSOC)){
							$pieces = explode(";", $bancoCriar['fisico']);
							foreach ($pieces as $piece) {
								$sqlPartes = $piece;
								$executaBanco = $con->prepare($sqlPartes);
								$executaBanco->execute();

							}
						}
					} catch (Exception $e) {
						echo "Não foi Possivel Criar o Banco!".$e;		
					}	
				}

				try{
					//Tenta fazer conexão com o banco para inserir as amostras
					$conAmostra = new PDO('mysql:host=localhost;dbname='.$nome.';charset=utf8', 'root', '');

				}catch(PDOException $b){
					echo "Houve um Erro ao Tentar Conectar ao Banco Criado!".$b->getMessage();
				}
				
				if($amostra != "" and $amostra != null){
					try{
						//Executa a amostra
						$partes = explode(";", $amostra);
						foreach ($partes as $parte) {
							$sqlPartesAmostra = $parte;
							$executaAmostra = $con->prepare($sqlPartesAmostra);
							$executaAmostra->execute();
						}
						
					}catch(PDOException $e){
						echo "Houve um Erro ao Tentar Inserir as Amostras!".$e->getMessage();
					}
				}
				
			
				//Se os dados forem inseridos com sucesso
				if ($sql){
					echo "<h1>Base de Dados Cadastrada com Sucesso.</h1>";
					echo "<div id='redirect'><h3>Você será redirecionado em 3 Segundos... </h3></div>";
					?>
						<meta http-equiv="refresh" content=3;url="/template/bancos.php">
					<?php
				}else{
					echo "Houve um Erro ao Tentar Cadastrar o Banco de Dados!";
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