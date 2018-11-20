<?php 
   include "include/conexao.php";
   session_start();
   if((int)$_SESSION['usuario'] == 0){
     unset($_SESSION);
     session_destroy();
     header('Location: login.php');
   }


  
   //Parte de código para excluir
   if(isset($_GET['excluir'])){
    $categoria_id = (int)$_GET['excluir'];

    $sql = "DELETE FROM categoria WHERE categoria = $categoria_id";  
    $res = mysqli_query($conexao, $sql);
   }


     //busca todos os cadastrados para fazer a lista de categorias
     $sql = "SELECT * FROM categoria";  
     $res = mysqli_query($conexao, $sql);
     $dados = mysqli_fetch_all($res, MYSQLI_ASSOC);
  
  

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

    <title>Mobile</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">    

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <?php include 'include/menu.php'; ?>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h3>Home</h3>
      </div>
      <div class="row">
        <div class="col-md-12">
        </div>        
      </div>
      <div class="row">
        <div class="col-md-12">
          Lista de categorias Cadastradas
          <table class="table">
            <tr>
              <th>Nome</th>
              <th>Ativo</th>
              <th colspan="2">Ações</th>
            </tr>
            <?php foreach($dados as $linha){?>
             <tr>
              <td><?=$linha['nome_categoria']?></td>
              <td><?=($linha['ativo']>0)?"Ativo":"Inativo"?></td>
              <td>
                  <a href="categoria.php?categoria=<?=$linha[categoria]?>">Editar</a>
                  <a href="index.php?excluir=<?=$linha[categoria]?>" onclick="return confirm('Deseja realmente excluir? ');">Excluir</a>
              </td>
            </tr>
            <?php } ?>
          </table>
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
