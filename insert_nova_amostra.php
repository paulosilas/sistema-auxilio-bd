<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
	$amostra = $_POST['amostras'];
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){

		//Cadastra a amostra usando o ID do ultimo banco cadastrado como chave estrangeira
		$sql = "INSERT INTO amostra_dados (amostra, cod_modelo) VALUES (:am, :ca)";
		$insereAmostra = $con->prepare($sql);
		$insereAmostra->bindParam(":am", $amostra);
		$insereAmostra->bindParam(":ca", $_SESSION['cod_modelo_nova_amostra']);
		$insereAmostra->execute();

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
			
		//Se os dados forem inseridos com sucesso
		if ($sql){
			echo "<h1>Amostra Cadastrada com Sucesso.</h1>";
			echo "<div id='redirect'><h3>Você será redirecionado em 3 Segundos... </h3></div>";
			?>
				<meta http-equiv="refresh" content=3;url="/adqs/bancos.php">
			<?php
		}else{
			echo "Houve um Erro ao Tentar Cadastrar o Banco de Dados!";
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
