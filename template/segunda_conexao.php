<?php
	
	$sqlConexao = "SELECT a.cod_atividade, a.semestre, r.cod_atividade, r.cod_questao, q.cod_questao, q.enunciado, q.cod_modelo, m.cod_modelo, m.nome, m.fisico FROM atividade as a INNER JOIN questao_e_atividade as r INNER JOIN questao as q INNER JOIN modelo as m WHERE m.cod_modelo = q.cod_modelo and a.cod_atividade = ".$_SESSION['cod_nova_atividade']." AND q.cod_questao = r.cod_questao AND r.cod_atividade = ".$_SESSION['cod_nova_atividade'].";";
	$rsConexao = mysql_query($sqlConexao, $con);

	if($valor = mysql_fetch_array($rsConexao)){

				$_SESSION['nome_db'] = $valor['nome'];
				error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

				$con2 = mysql_connect("localhost", "root", "", TRUE) or die ("A conexão do segundo banco falhou!");
	 			$db2 = mysql_select_db($valor['nome'], $con2);
				
	}


?>