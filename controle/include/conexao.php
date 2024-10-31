<?php
	$hostdb = "localhost";
	$usernamedb = "root";
	$passworddb= "";
	$database = "bd_siscm";
	$message = "";
		$conexao = new PDO("mysql:host=$hostdb; dbname=$database", $usernamedb, $passworddb);
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>