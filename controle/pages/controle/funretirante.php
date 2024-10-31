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
 $nomecompletopost=utf8_decode($_POST['nomecompleto']);
 $setorpost=$_POST['setor'];


 $query = "UPDATE retirante SET nome=:nome, setor=:setor WHERE id_retirante=:id";
 $statement = $conexao->prepare($query);
 $statement->execute(
   array(

     ':id' => $idpost,
     ':nome' => $nomecompletopost,
     ':setor' => $setorpost,
     )
   );

 if($statement){

 //echo '<div class="sucesso">cadastrado com sucesso!</div>';
  $status="Retirante Atualizada com sucesso!";
  echo "<meta http-equiv=\"refresh\" content=\"0;url=../retirantes.php?status=".$status."\">"; 

}else{

              //echo '<div class="naosucesso">Não cadastrado</div>';
  $status="Não Atualizado!";
  echo "<meta http-equiv=\"refresh\" content=\"0;url=../retirantes.php?status=".$status."\">"; 
}

} elseif(isset($_POST['nome'])) {

  $nome=utf8_decode($_POST['nome']);
  $setor=$_POST['setor'];

  $query = "INSERT INTO retirante (nome, setor) VALUES (:nome, :setor)";
  $statement = $conexao->prepare($query);
  $statement->execute(
    array(
      'nome' => $nome, 
      'setor' => $setor,        
      )
    );

  if($statement){

      //echo '<div class="sucesso">cadastrado com sucesso!</div>';
    $status="Retirante Cadastrada com sucesso!";
    echo "<meta http-equiv=\"refresh\" content=\"0;url=../retirantes.php?status=".$status."\">"; 

  }else{

      //echo '<div class="naosucesso">Não cadastrado</div>';
    $status="Não Cadastrado!";
    echo "<meta http-equiv=\"refresh\" content=\"0;url=../retirantes.php?status=".$status."\">"; 
  }


}else{

   //echo '<div class="naosucesso">Não cadastrado</div>';
 $status="Erro!";
 echo "<meta http-equiv=\"refresh\" content=\"0;url=../retirantes.php?status=".$status."\">"; 

}

?>

