<?php
$servidor_bd = "localhost";
$usuario_bd = "root";
$senha_bd = "";
$nome_bd = "projetoagenda";
$conexao = mysqli_connect($servidor_bd, $usuario_bd, $senha_bd, $nome_bd);


if (!$conexao) {
  die("Erro: não foi possível conectar ao banco de dados! Detalhes: " . mysqli_connect_error());
}
mysqli_set_charset($conexao,'utf8');

ini_set('default_charset','UTF-8');
?>