<?php
session_start();

$_SESSION["nome"] = 0;
$_SESSION["email"] = 0;
$_SESSION["senha"] = 0;
$_SESSION["EMAIL_CERTO"] = 0;

include_once("conectar.php");
include_once("validaSessão.php");

$USER_NOME = $_POST["USER_NOME"];
$USER_EMAIL = $_POST["USER_EMAIL"];
$USER_SENHA = $_POST["USER_SENHA"];


if(empty($USER_NOME) || strlen($USER_NOME) < 5){
    $_SESSION["nome"] = 1;
}

if(empty($USER_EMAIL) || strlen($USER_EMAIL) < 10){
    $_SESSION["email"] = 1;
}

if(empty($USER_SENHA) || strlen($USER_SENHA) < 5){
    $_SESSION["senha"] = 1;
}

$queryUser = "SELECT * FROM TB_USUARIOS";
 $resUser = mysqli_query($conexao, $queryUser)  or die ('ERRO - Não foi possível retornar o dados de usuário solicitados.');
 while($user = mysqli_fetch_assoc($resUser)){
     if(strcmp($user["USER_EMAIL"], $USER_EMAIL) == 0){
          $_SESSION["EMAIL_CERTO"] = 1;
        }
    }

if( $_SESSION["nome"] == 1 ||  $_SESSION["email"] == 1 ||  $_SESSION["senha"] == 1 || $_SESSION["EMAIL_CERTO"] == 1){
    header("location: cadastroUser.php");
}else{

$query = "INSERT INTO TB_USUARIOS (USER_NOME, USER_EMAIL, USER_SENHA) VALUES ('$USER_NOME', '$USER_EMAIL', '$USER_SENHA')";
mysqli_query($conexao,$query) or die("Erro: não foi possível registrar no banco de dados!");
mysqli_close($conexao);
header("location: login.php");
}
?>