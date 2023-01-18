<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Relatórios</title>
</head>

<?php
include_once("validaSessão.php");
include_once("conectar.php");

if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
}
$query = "SELECT * FROM TB_RELATORIOS WHERE RELATORIO_USERID = '$id'";
$res = mysqli_query($conexao, $query)  or die ('ERRO - Não foi possível retornar o dados de Relatórios solicitados.');

if(empty(mysqli_fetch_assoc($res))){
  $_SESSION["relatorios"] = 0;
}else{
  $_SESSION["relatorios"] = 1;
}
?>

<body class="bg-light text-dark">
<header>
<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark"> <button class="navbar-toggler" type="button"
        data-target="#navigation"> <span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse">
        <h1 class="imgLogo2 ml-3 text-white mt-2 mb-2 mr-0">Keep Me P🕑sted</h1>
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"> <a href="index.php" class="nav-link"> Compromissos e Reuniões </a> </li>
          <li class="nav-item"> <a href="tela_relatorio.php" class="nav-link"> Escrever Relatórios </a> </li>
          <li class="nav-item active" class="nav-item"> <a href="relatorios.php" class="nav-link"> Relatórios </a> </li>
        </ul>
      </div>
      <img id="avatar" src="user.png" class="rounded-circle mb-1 mr-4" style="width: 50px;"
  alt="Avatar" />

<p class="mb-2 ml-4 mr-4 text-white"><strong><?php echo $_SESSION["nome"]?></strong></p>
      <div class="d-flex flex-row-reverse mr-4">
      <div class="flex space-x-2 justify-center">
  <div>
    <a style="text-decoration: none;" href="sair.php"><button type="button" class="h-8 px-6 pt-2.5 pb-2 flex btnSair font-medium rounded shadow-md">
    <svg width="18px" height="18px" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-door-closed mt-2 mr-2">
  <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
  <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
    </svg>
      <span class="mt-1"> SAIR </span>
    </button><a>
  </div>
</div>
</div>
    </nav>
  </header>
  <div class="h-full w-full">
    <?php
    if (isset($_SESSION["relatorios"])){
      if($_SESSION["relatorios"] == 0){
    ?>
  <div class="card mx-auto w-75 mt-3">
    <div class="card-body">
      <h4 class="card-title"><a>Nenhum Relatório Cadastrado</a></h4>
      <p class="card-text">Cadastre um novo relatório à lista.</p>
      <div class="text-center"><a style="text-decoration: none;" href="tela_relatorio.php"><button style="background-color: rgb(93, 148, 225);" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar</button></a></div>
      <?php 
      }
    }
    ?>
    </div>
</div>
</div>
<?php
if (isset($_SESSION["relatorios"])){
  if($_SESSION["relatorios"] == 1){
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
    $query = "SELECT * FROM  TB_RELATORIOS WHERE RELATORIO_USERID = '$id'";
    $eventoPage = mysqli_query($conexao, $query);
    $total = mysqli_num_rows($eventoPage); 
    $qtdRegistros = 3;
    $numPaginas = ceil($total/$qtdRegistros);
    $inicio = ($qtdRegistros*$pagina)-$qtdRegistros;
    $query = "SELECT * FROM TB_RELATORIOS WHERE RELATORIO_USERID = '$id' LIMIT $inicio, $qtdRegistros"; 
    $evento = mysqli_query($conexao, $query); 
    $total = mysqli_num_rows($evento);
    $res = mysqli_query($conexao, $query)  or die ('ERRO - Não foi possível retornar o dados solicitados.');
    while($doc = mysqli_fetch_assoc($res)){
    ?>
  <div class="card mx-auto w-75 mt-3">
      <div class="card-body">
       <h4 class="card-title"><a>Relacionado ao Evento: <span class="card-text"> <?php echo $doc["RELATORIO_EVENTO_TITULO"];?></span></a></h4>
        <p class="card-text"><span class="font-bold"> Relatório:</span> <a href="abreRelatorio.php?tabela=TB_RELATORIOS&idRelatorio=RELATORIO_ID&codigo=<?php echo $doc['RELATORIO_ID']?>&origem=index.php"><?php echo $doc["RELATORIO_NOME"];?></a></p> 
        <div class="d-flex flex-row-reverse">
        <a style="text-decoration: none;" href="concluir.php?tabela=TB_RELATORIOS&id=RELATORIO_ID&codigo=<?php echo $doc['RELATORIO_ID']?>&origem=relatorios.php" onclick="return confirm('Deseja Excluir: <?php echo $doc['RELATORIO_NOME']?>?'); "><button type="button" class="btn btn-danger btn-block mb-4"><i class="fa fa-trash"></i> Deletar</button></a>
      </div>
      </div>
      </div>
    </div>
    <?php
    }
    }
  }
  ?>
   <?php
if (isset($_SESSION["relatorios"])){
  if($_SESSION["relatorios"] == 1){?>
  <div class="position-absolute text-right btnAdiciona" style="bottom: 30px; right: 30px;">
  <a style="text-decoration: none; color: white" href="tela_relatorio.php"><button style="font-size: 32px; height: 75px ; width:75px;" type="button" class="shadow rounded-circle"><i class="fa fa-plus"></i></button></a>
    </div>
    <?php }}
    if(isset($pagina) && isset($numPaginas)){?>
   <nav class="mt-4">
  <ul class="pagination justify-content-center ">
    <?php

    if($pagina > 1) {
      echo "<li class='page-item '><a class='page-link border border-dark' href='relatorios.php?pagina=".($pagina - 1)."'>Anterior</a></li>";
  }
   
  for($i = 1; $i < $numPaginas + 1; $i++) {
      $ativo = ($i == $pagina) ? 'numativo' : '';
      echo "<li class='page-item'><a class='page-link' href='relatorios.php?pagina=".$i."'> ".$i." </a></li>";
  }
       
  if($pagina < $numPaginas) {
    echo "<li class='page-item'><a class='page-link' href='relatorios.php?pagina=".($pagina + 1)."'>Próximo</a><li>";
  }
}
  ?>
  </ul>
</nav>
</body>
</html>