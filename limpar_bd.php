<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$con = conecta();
?>        

<div id="content">
	<div id="caixa">
	<?php
	if($con){
		$sql = "SELECT * FROM modelo WHERE cod_modelo=".$_GET['seq'];
		$buscarModelo = $con->prepare($sql);
		$buscarModelo->execute();


			while($modelo = $buscarModelo->fetch(PDO::FETCH_ASSOC)){

				$db_name = $modelo['nome'];

				if($db_name != ""){
					try{
						$con2 = new PDO('mysql:host=localhost;dbname='.$db_name.';charset=utf8', 'root', '');
					}catch(PDOException $e){
						//var_dump($e);
						echo $e->getMessage();
					}
				}
			

				$sqlDroparKey = "SET FOREIGN_KEY_CHECKS=0;";
				$zerarChave = $con2->prepare($sqlDroparKey);
				$zerarChave->execute();

				$sqlLimpar = "SELECT Concat('TRUNCATE TABLE ',table_schema,'.',TABLE_NAME, ';') as tabelas FROM INFORMATION_SCHEMA.TABLES where  table_schema in ('".$modelo['nome']."')";	
				$limparBanco = $con2->prepare($sqlLimpar);
				$limparBanco->execute();

				while($tabelas = $limparBanco->fetch(PDO::FETCH_ASSOC)){

					$sqlTrunca = $tabelas['tabelas'];
					$limpar = $con2->prepare($sqlTrunca);
					$limpar->execute();
				}

				$sqlLigarKey = "SET FOREIGN_KEY_CHECKS=1;";
				$ligarChave = $con2->prepare($sqlLigarKey);
				$ligarChave->execute();

				//Fechar a conexão e resetar o nome do segundo Banco
				unset($con2);
				$_SESSION['nome_db'] = "";

				echo "<h1>Banco Foi Limpo com Sucesso!</h1>";
				echo "<div id='redirect'><h3>Você será redirecionado em 3 Segundos... </h3></div>";
				?>
					<meta http-equiv="refresh" content=3;url="/template/bancos.php">
				<?php
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
