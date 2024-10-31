<?php
session_start();

if ( !isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {
    //Destrói
    session_destroy();
    //Limpa
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    
    //Redireciona para a página de autenticação
    header('location:..\index.php');
}

include('../../include/conexao.php');

if(isset($_POST['nome_e'])){

 $idpost=$_POST['id_e'];
 $nomepost=utf8_decode($_POST['nome_e']);
 $categoriapost=$_POST['categoria_e'];
 $minimopost=$_POST['estoqueminimo_e'];


 $query = "UPDATE produto SET nome=:nome, categoria=:categoria, estoque_minimo=:estoque_minimo WHERE id_produto=:id";
 $statement = $conexao->prepare($query);
 $statement->execute(
   array(
     ':id' => $idpost,
     ':nome' => $nomepost,
     ':categoria' => $categoriapost,
     ':estoque_minimo' => $minimopost,
     )
   );

 if($statement){

              //echo '<div class="sucesso">cadastrado com sucesso!</div>';
  $status="Produto Atualizada com sucesso!";
  echo "<meta http-equiv=\"refresh\" content=\"0;url=../produtos.php?status=".$status."\">"; 

}else{

              //echo '<div class="naosucesso">Não cadastrado</div>';
  $status="Não Atualizado!";
  echo "<meta http-equiv=\"refresh\" content=\"0;url=../produtos.php?status=".$status."\">"; 
}

} elseif(isset($_POST['nome_p'])) {

  $nomepost=utf8_decode($_POST['nome_p']);
  $categoriapost=$_POST['categoria_p'];
  $minimopost=$_POST['estoqueminimo_p'];

  $query = "INSERT INTO produto(nome,categoria,estoque_minimo,estoque_atual) VALUES (:nome, :categoria, :estoque_minimo ,:estoque_atual)";
  $statement = $conexao->prepare($query);
  $statement->execute(
    array(
      'nome' => $nomepost,  
      'categoria' => $categoriapost, 
      'estoque_minimo' => $minimopost, 
      'estoque_atual' => 0,       
      )
    );

  if($statement){

      //echo '<div class="sucesso">cadastrado com sucesso!</div>';
    $status="Produto Cadastrada com sucesso!";
    echo "<meta http-equiv=\"refresh\" content=\"0;url=../produtos.php?status=".$status."\">"; 

  }else{

      //echo '<div class="naosucesso">Não cadastrado</div>';
    $status="Não Cadastrado!";
    echo "<meta http-equiv=\"refresh\" content=\"0;url=../produtos.php?status=".$status."\">"; 
  }


}else{

   //echo '<div class="naosucesso">Não cadastrado</div>';
 $status="Erro!";
 echo "<meta http-equiv=\"refresh\" content=\"0;url=../produtos.php?status=".$status."\">"; 

}

?>

