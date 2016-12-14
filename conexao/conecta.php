<?php
		session_start('minha_sessao');
		error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
		$con = mysql_connect("localhost","root", "", TRUE) or die ("A conexão com o servidor não foi executada com sucesso!");
		$db = mysql_select_db("tcc", $con) or die ("Não foi possível selecionar o banco de dados!");	

		$db_name = $_SESSION['nome_db'];
		if($db_name != ""){
			$con2 = mysql_connect("localhost", "root", "", TRUE) or die ("A conexão do segundo banco com o servidor não foi executada com sucesso!");
			$db2 = mysql_select_db($db_name, $con2) or die ("Não foi possível selecionar o segundo bando de dados!");
		}
?>