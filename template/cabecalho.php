<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>IFSP - Caraguatatuba</title>

        <link rel="stylesheet" href="css/style.css" type="text/css"/>

        <?php
        
        include "conexao/conecta.php";

        //Verifica se ainda está logado
        if($_SESSION['login'] == null){
            header('location:index.php'); 
        }

        //Verifica se o usuário não é um aluno
        if($_SESSION['permissao'] != 2){
            header('location:erro.php');
        }
        
        ?>
    </head>
    
    <body>
    <div id="tudo">
        <div id="page">
            <div id="header">
                <img src="img/logo.png">
            </div>
            <div id="meio">