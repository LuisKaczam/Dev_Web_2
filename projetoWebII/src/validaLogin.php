<?php
session_start();
$email = $_POST["loginEmail"];
$senha = $_POST["loginSenha"];

include_once("conectar.php");


$query = "SELECT * FROM TB_USUARIOS WHERE USER_EMAIL = '$email' AND USER_SENHA =  '$senha'";
$res = mysqli_query($conexao, $query) or die ('ERRO - Não foi possível executar a Query: ' . mysqli_error($conexao));

if ($registro = mysqli_fetch_assoc($res)){
	$nome = $registro["USER_NOME"];
	$id = $registro["USER_COD"];
	$_SESSION["login"] = $email;
	$_SESSION["nome"] = $nome;
	$_SESSION["id"] = $id;

	header("Location:index.php");
} else {
	header("Location:login.php?erro=Login inválido.");
	$_SESSION["login"] = 1;
}
?>