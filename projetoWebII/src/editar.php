<?php 
include_once("conectar.php");
include_once("validaSessão.php");
if(isset($_POST["Editar"])){

    if(isset($_SESSION["id"])){
        $EVENTO_USERID = $_SESSION["id"];
    }
    
    $_SESSION["eventoTitulo"] = 0;
    $_SESSION["evento_data"] = 0;
    $_SESSION["evento_hora"] = 0;
    
    
    $id = $_POST["EVENTO_ID_EDIT"];
    $EVENTO_TITULO = $_POST["EVENTO_TITULO_EDIT"];
    $EVENTO_DESC = $_POST["EVENTO_DESC_EDIT"];
    $EVENTO_DATA = $_POST["EVENTO_DATA_EDIT"];
    $EVENTO_HORA = $_POST["EVENTO_HORA_EDIT"];
    $EVENTO_LOCAL = $_POST["EVENTO_LOCAL_EDIT"];
    
    if(empty($EVENTO_TITULO)){
        $_SESSION["eventoTitulo"] = 1;
    }
    
    if(empty($EVENTO_DATA)){
        $_SESSION["evento_data"] = 1;
    }
    
    if(empty($EVENTO_HORA)){
        $_SESSION["evento_hora"]  = 1;
    }
    
    if($_SESSION["eventoTitulo"] == 1 ||  $_SESSION["evento_data"]  == 1 || $_SESSION["evento_hora"] == 1){
        header("Location: index.php");
    }else{


  $query = "UPDATE TB_EVENTOS SET EVENTO_TITULO ='$EVENTO_TITULO', EVENTO_DESC = '$EVENTO_DESC', EVENTO_DATA = '$EVENTO_DATA', EVENTO_HORA = '$EVENTO_HORA',  EVENTO_LOCAL = '$EVENTO_LOCAL' WHERE EVENTO_ID = '$id'"; 
  mysqli_query($conexao, $query) or die("Erro: não foi possível atualizar o registro no banco de dados!" . mysqli_error($conexao));
  mysqli_close($conexao);
  ?>
<script>
    alert("O Registro foi Atualizado com Sucesso!");
    window.location="index.php";
  </script>


<?php }
}; ?>

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
  <title>Editar Evento</title>
  <?php
  include_once("validaSessão.php");?>
</head>
<body class="bg-light text-dark">
<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark"> <button class="navbar-toggler" type="button"
        data-target="#navigation"> <span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse">
        <h1 class="imgLogo2 ml-3 text-white mt-2 mb-2 mr-0">Keep Me P🕑sted</h1>
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"> <a href="index.php" class="nav-link"> Compromissos e Reuniões </a> </li>
          <li class="nav-item"> <a href="tela_relatorio.php" class="nav-link"> Escrever Relatórios </a> </li>
          <li class="nav-item"> <a href="relatorios.php" class="nav-link"> Relatórios </a> </li>
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
<?php
  if(isset($_GET['codigo'])):
    $id = $_GET['codigo'];
    $query = "SELECT * FROM TB_EVENTOS WHERE EVENTO_ID = $id";
    $res = mysqli_query($conexao, $query) or die ('ERRO - Não foi possível executar a Query: ' . mysqli_error($conexao));
    $campo = mysqli_fetch_array($res);
    

   
  ?>

<div class="w-75 h-screen m-12 mx-auto">
    <form class="mt-8" name="Evento" action="editar.php" method="POST">
      <div class="mb-6 text-center text-3xl">
        <label class="text-gray-700 font-bold" for="name">Editar Evento</label>
      </div>
      <div class="form-outline mb-4">
        <label class="form-label" for="form4Example1">Código de Identificação do Evento</label>
        <input readonly type="text" id="form4Example1" class="form-control" name="EVENTO_ID_EDIT" value="<?php echo $campo["EVENTO_ID"];?>" />
      </div>
      <div class="form-outline mb-4">
        <label class="form-label" for="form4Example1">Título</label>
        <input type="text" id="form4Example1" class="form-control" name="EVENTO_TITULO_EDIT" value=" <?php echo $campo["EVENTO_TITULO"];?>" />
      </div>
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form6Example1">Data</label>
            <input type="date" id="form6Example1" class="form-control" name="EVENTO_DATA_EDIT"  value="<?php echo $campo["EVENTO_DATA"];?>" />
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form6Example2">Hora</label>
            <input type="time" id="form6Example2" class="form-control" name="EVENTO_HORA_EDIT"  value="<?php echo $campo["EVENTO_HORA"];?>" />
          </div>
        </div>
        </div>
      <div class="form-outline mb-4">
        <label class="form-label" for="form4Example1">Endereço</label>
        <input type="text" id="form4Example1" class="form-control" name="EVENTO_LOCAL_EDIT" value="<?php echo $campo["EVENTO_LOCAL"];?>"/>
      </div>
      <div class="form-outline mb-4">
        <label class="form-label" for="form4Example3">Descricão</label>
        <textarea class="form-control" id="form4Example3" rows="4" name="EVENTO_DESC_EDIT"  value="<?php echo $campo["EVENTO_DESC"];?>"></textarea>
      </div>
      <div class="d-flex flex-row-reverse">
      <a style="text-decoration: none;" href= "index.php"><button id="close" type="button" class="btn btn-danger btn-block mb-4"><i class="fa fa-trash"></i> Cancelar</button></a>
      <button name="Editar" type="submit" class="btn btn-success btn-block mb-4 mr-4"><i class="fa fa-save"></i> Salvar</button>
    </div>
    </form>
    <?php endif; ?>
  </div>
  </div>
</div>
    
  </div>
</div> 
</div>
</div>
<footer class="text-center lg:text-left bg-black w-full">
        <div class="text-white text-center p-4">
        © 2022 Copyright: Luis Felipe Kaczam
        </div>
      </footer>
</body>
</html>