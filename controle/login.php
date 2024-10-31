<?php

session_start();
session_destroy();
session_start();

if(isset($_POST['login'])){

	$user = $_POST['login'];
	$pass = $_POST['senha'];

	include 'include/conexao.php';

	$rs = $conexao->query("SELECT  id_usuario, apelido, nome, login FROM usuario WHERE login='$user' and senha='$pass' and ativo_S_N='S' ");

	while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
		
		$apelido=$row["apelido"];
		$nome=$row["nome"];
		$login=$row["login"];
		$senha=$row["senha"];
	}  

	if (!empty($login)){

		$_SESSION['apelido']=trim($apelido);
		$_SESSION['nome']=trim($nome);
		$_SESSION['login']=trim($login);
		
		header('location:pages/index.php');	
	}else{

		header('location:index.php?menssage=Usuário ou senha incorreto');
	}

}

?>
