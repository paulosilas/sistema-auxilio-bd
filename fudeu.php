<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>IFSP - Caraguatatuba</title>

        <link rel="stylesheet" href="css/estilo.css" type="text/css"/>
        <?php
        include "conexao/conecta.php";
        ?>
    </head>
    
    <body>
    <div id="tudo">
        <div id="page">
            <div id="header">
                <img src="img/logo.png">
            </div>
            <div id="meio">
                <div id="sidebar">
                    <div class="menu"><!--  menu  -->
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Cadastros</a>
                                <ul class="submenu">
                                    <li><a href="cadastrar_questao.php">Questão</a></li>
                                    <li><a href="cadastrar_resposta.php">Resposta</a></li>
                                    <li><a href="cadastrar_amostra.php">Amostra</a></li>
                                    <li><a href="cadastrar_bd.php">Base de Dados</a></li>
                                </ul>
                            </li>
                            <li><a href="questoes_cadastradas.php"> Questões Cadastradas</a></li>
                            <li><a href="bancos.php"> Bancos Cadastrados</a></li>
                            <li><a href="login.php">Login</a></li>
                        </ul>
                    </div> <!-- fecha menu -->
                </div>
                <div id="content">
                    <div id="index">
                         <h1>Bem Vindo!</h1>
                    </div>
                </div>
                <?php
                    mysql_close($con);
                ?>
            </div>
            <div id="footer">
                <p>©Renan Lucas Oliveira - TCC - Trabalho de Conclusão de Curso</p>
            </div>
        </div>
    </div>
    </body>
</html>