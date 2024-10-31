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

if(isset($_POST['id'])){

 $idpost=$_POST['id'];
 $descricaopost=utf8_decode($_POST['categoria']);


 $query = "UPDATE categoria SET nome=:nome WHERE id_categoria=:id";
 $statement = $conexao->prepare($query);
 $statement->execute(
   array(

     ':id' => $idpost,
     ':nome' => $descricaopost,
     )
   );

 if($statement){

              //echo '<div class="sucesso">cadastrado com sucesso!</div>';
  $status="Categoria Atualizada com sucesso!";
  echo "<meta http-equiv=\"refresh\" content=\"0;url=../categorias.php?status=".$status."\">"; 

}else{

              //echo '<div class="naosucesso">Não cadastrado</div>';
  $status="Não Atualizado!";
  echo "<meta http-equiv=\"refresh\" content=\"0;url=../categorias.php?status=".$status."\">"; 
}

} elseif(isset($_POST['desccat'])) {

  $categoria=utf8_decode($_POST['desccat']);

  $query = "INSERT INTO categoria (nome) VALUES (:nome)";
  $statement = $conexao->prepare($query);
  $statement->execute(
    array(
      'nome' => $categoria,         
      )
    );

  if($statement){

      //echo '<div class="sucesso">cadastrado com sucesso!</div>';
    $status="Categoria Cadastrada com sucesso!";
    echo "<meta http-equiv=\"refresh\" content=\"0;url=../categorias.php?status=".$status."\">"; 

  }else{

      //echo '<div class="naosucesso">Não cadastrado</div>';
    $status="Não Cadastrado!";
    echo "<meta http-equiv=\"refresh\" content=\"0;url=../categorias.php?status=".$status."\">"; 
  }


}else{

   //echo '<div class="naosucesso">Não cadastrado</div>';
 $status="Erro!";
 echo "<meta http-equiv=\"refresh\" content=\"0;url=../categorias.php?status=".$status."\">"; 

}

?>

