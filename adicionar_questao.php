<?php
	include "template/topo.php";	
	include "template/menu_professor.php";
	$questao = $_POST['codigo']; 
	?>        

<div id="content">
	<div id="caixa">
		<?php
			if($con){
				foreach($questao as $k => $v){ 
					$sql = "INSERT INTO questao_e_atividade(cod_questao, cod_atividade) ".
					"VALUES ('$v', '".$_SESSION['cod_nova_atividade']."')";
					$rs = mysql_query($sql, $con);
				}
	
				if($rs){?>
					<meta http-equiv="refresh" content=0;url="http://localhost:8088/template/atividade_questoes.php?seq=<?php echo $_SESSION['cod_nova_atividade'];?>">
					<?php

				}else{
					echo "Falha ao criar atividade: ".mysql_errno();
				}
				
			}else{
				echo "Falha de conexão ao banco de dados: ".mysql_error();
			}
		?>
	</div>
</div>

<?php
	include "template/rodape.php";	
?>