<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "root";
	$dbname = "bancosite";
	define('CHARSET', 'utf8');
	
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

?>
