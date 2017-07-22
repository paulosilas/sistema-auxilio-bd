<?php
		session_start();

		/**
		 *	Cria a conexão com o banco de dados
		 */
		function conecta(){
			try{
				$pdo = new PDO('mysql:host=localhost;dbname=tcc;charset=utf8', 'root', '');
			}catch(PDOException $e){
				//var_dump($e);
				echo $e->getMessage();
			}
			return $pdo;
		}

		/**
		 *	Cria a conexão com o segundo banco de dados
		 */

		if(isset($_SESSION['nome_db'])){
			$db_name = $_SESSION['nome_db'];
		}


		function conectaSegundo(){
			try{
				$db_name = $_SESSION['nome_db'];
				$pdo2 = new PDO('mysql:host=localhost;dbname='.$db_name.';charset=utf8', 'root', '');
			}catch(PDOException $e){
				//var_dump($e);
				echo $e->getMessage();
			}
				return $pdo2;
			}
		

		/**
		 * Cria o hash da senha, usando MD5 e SHA-1
		 */
		function make_hash($str)
		{
		    return sha1(md5($str));
		}

		/**
		 * Verifica se o usuário está logado
		 */
		function isLoggedIn()
		{
		    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
		    {
		        return false;
		    }
		 
		    return true;
		}
		
?>
