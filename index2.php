<?php 

	include "include/conexao.php";


	$sql = "SELECT * FROM pessoa";  
	$res = mysqli_query($conexao, $sql);

	$dados = mysqli_fetch_all($res, MYSQLI_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>index</title>
  </head>
  <body>
  	<table>
  		<tr>
  			<th>Nome:</th>
  			<th>CPF</th>
  			<th>Email</th>
  			<th>Cidade</th>
  			<th>Ações</th>
  		</tr>
  		<?php foreach($dados as $linha){?>
  		<tr>
  			<td><?=$linha['nome']?></td>
  			<td><?=$linha['cpf']?></td>
  			<td><?=$linha['email']?></td>
  			<td><?=$linha['cidade']?></td>
<td><a href="pessoa.php?pessoa=<?=$linha['id_pessoa']?>">Editar</a></td>
			<td>Excluir</td>

  		</tr>
  		<?php } ?>
  	</table>
   </body>
</html>