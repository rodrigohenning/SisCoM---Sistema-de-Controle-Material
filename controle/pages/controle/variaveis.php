<?php

if ( !isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {
    //Destrói
    session_destroy();
    //Limpa
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    
    //Redireciona para a página de autenticação
    header('location:..\index.php');
}

include('../include/conexao.php');


//Total de Produtos Cadastrados!
$rs = $conexao->query("SELECT  COUNT(*) as total FROM produto");

              while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

              $totalProdutos=$row["total"]; 

}     



// Total De produtos Com estoquei Minimo ou Abaixo do minimo!
$rs = $conexao->query("SELECT  COUNT(*) as total FROM produto WHERE estoque_minimo>estoque_atual");
                                       
             while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

               $totalMinimo=$row["total"];                              
            }  


$totalCard=0;
//Total de Produtos A serem Finalizados a Saída!
$rs = $conexao->query("SELECT quantidade FROM card");
                                       
             while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

               $totalCard=$totalCard+$row["quantidade"];                              
            }  


//Total Retirantes Cadastrados!
 $rs = $conexao->query("SELECT count(*) total FROM retirante");
                                       
              while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

              $totalRetirantes=$row["total"];                              
           }  



?>

