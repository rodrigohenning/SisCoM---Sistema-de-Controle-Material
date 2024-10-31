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

if(isset($_POST['dataentrada'])){

 $postdataentrada=$_POST['dataentrada'];
 $postcategoria=utf8_decode($_POST['categoria']);
 $postproduto=$_POST['produto'];
 $postfornecedor=$_POST['fornecedor'];
 $postquantidade=$_POST['quantidade'];
 $postdescricao=$_POST['descricao'];


  $query = "INSERT INTO entrada(data,categoria,produto,fornecedor,quantidade,obs) VALUES (:data,:categoria,:produto,:fornecedor,:quantidade,:obs)";
  $statement = $conexao->prepare($query);
  $statement->execute(
    array(
      'data' => $postdataentrada,  
      'categoria' => $postcategoria, 
      'produto' => $postproduto, 
      'fornecedor' => $postfornecedor,  
      'quantidade' => $postquantidade,
      'obs' => $postdescricao,         
      )
    );

 if($statement){

         $query = "UPDATE produto SET estoque_atual=:estoque_atual WHERE id_produto=:id";
         $statement1 = $conexao->prepare($query);
         $statement1->execute(
           array(
             ':id' => $postproduto,
             ':estoque_atual' => $postquantidade,
             )
           );

             if($statement1){

                          //echo '<div class="sucesso">cadastrado com sucesso!</div>';
              $status="Entrada Realizada com Sucesso!";
              echo "<meta http-equiv=\"refresh\" content=\"0;url=../entradamaterial.php?status=".$status."\">"; 

            }else{

                          //echo '<div class="naosucesso">Não cadastrado</div>';
              $status="ERRO! Entrada não Realizada";
              echo "<meta http-equiv=\"refresh\" content=\"0;url=../entradamaterial.php?status=".$status."\">"; 
            }


  }else{

    //echo '<div class="naosucesso">Não cadastrado</div>';
    $status="ERRO! Entrada não Realizada";
    echo "<meta http-equiv=\"refresh\" content=\"0;url=../entradamaterial.php?status=".$status."\">"; 
  }
}


?>

