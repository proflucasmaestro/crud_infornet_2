<?php

 include "include/conexao.php";

 session_start();
 if((int)$_SESSION['usuario'] == 0){
   unset($_SESSION);
   session_destroy();
   header('Location: login.php');
 }



if(isset($_GET['categoria'])){
  $categoria = (int)$_GET['categoria']; 

  $sql = "SELECT * FROM categoria 
          WHERE categoria = $categoria ";  
  $res = mysqli_query($conexao, $sql);
  $dados = mysqli_fetch_all($res, MYSQLI_ASSOC);
}


 if(isset($_POST['btnacao'])){

   $nome          = $_POST['nome'];
   $ativo         = (strlen(trim($_POST['ativo']))>0)? "1" : "0";
   $categoria_id = (int)$_POST["categoria_id"];

   //echo "nome = $nome ativo = $ativo ";  // para imprimir e visualizar os dados dos campos. 

   //validacao
  if(strlen(trim($nome)) == 0){
    $msg_erro .= "Informar o campo nome. <br>";
  }

 //insert e update
  if(strlen(trim($msg_erro)) == 0){
    if($categoria_id == 0){
      $sql = "INSERT INTO categoria (nome_categoria, ativo) 
        VALUES ('$nome', '$ativo' )";   
    }else{
        $sql = "UPDATE categoria set 
        nome_categoria = '$nome',
         ativo = '$ativo' 
         WHERE categoria = $categoria_id ";
    }   
    $res = mysqli_query($conexao, $sql);
    //echo nl2br($sql); // comando para mostrar a instrução sql que vai para o banco. 
    //echo mysqli_error($conexao); // comando para mostrar erro da query se houver

    if(strlen(mysqli_error($conexao))==0){
      $ok = "Cadastro Efetuado com sucesso.";
    }
    
  }
 }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Cadastro de categorias</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">    

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <?php include "include/menu.php"; ?>
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h3>Categoria</h3>
      </div>
      <div class="row">
        <div class="col-md-12">
          Formulário para Cadastro de categoria
          <?php if(strlen(trim($ok))>0){ ?>
            <div class="alert alert-success" role="alert"><?php echo $ok ?></div>
          <?php } ?>


          <?php if(strlen(trim($msg_erro))>0){ ?>
            <div class="alert alert-danger" role="alert"><?php echo $msg_erro?></div>
          <?php } ?>
        </div>        
      </div>
      <div class="row">
        <div class="col-md-12">
          <form name="frm_categoria" method="POST" action="categoria.php">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nome</label>
    <input type="text" name="nome" class="form-control" id="nome" value="<?=$dados[0]['nome_categoria']?>">
                </div>
              </div> 
               
            </div>
            
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label>Ativo</label>
                  <input type="checkbox" name="ativo"  id="ativo" <?= ($dados[0]['ativo']==1) ? " checked ": ""; ?> value="1">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
  <input type="hidden" name="categoria_id" value="<?=$dados[0]['categoria']?>">
  <input type="submit" class="btn btn-primary" name="btnacao" value="Gravar">
              </div>
            </div>         
          </form>
        </div>
      </div>
    </div>   

    <footer class="footer">
      <div class="container">
        <p class="text-muted">ETEC - Antônio Devisate - Infonet 2 </p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
