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
?>

<!DOCTYPE html>
<html lang="en">

    <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>SB Admin 2 - Bootstrap Admin Theme</title>

      <!-- Bootstrap Core CSS -->
      <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

      <!-- MetisMenu CSS -->
      <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

      <!-- DataTables CSS -->
      <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

      <!-- DataTables Responsive CSS -->
      <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

      <!-- Custom CSS -->
      <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

      <!-- Custom Fonts -->
      <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="../js/jquery.maskMoney.js" type="text/javascript"></script>
      </head>

      <body>


        <?php 



        if(isset($_POST['produto'])){

          $clienteid=$_GET['id'];
          $produtoid=$_POST['produto']; 
          $quantidade=$_POST['quantidade'];                         
          $data=date("d/m/y H:i:s");



          $rs = $conexao->query("SELECT id_produto, estoque_atual  FROM  produto WHERE id_produto='$produtoid' ");
          
          while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {  

           $estoque_atual=$row["estoque_atual"];
           
         }               

         if ($estoque_atual>= $quantidade) {

          $query = "INSERT INTO card (retirante, produto, quantidade, data) VALUES (:retirante, :produto, :quantidade, :data)";

          $statement = $conexao->prepare($query);
          $statement->execute(
            array(
              'retirante' => $clienteid,
              'produto' => $produtoid, 
              'quantidade' => $quantidade,    
              'data' => $data,          
              )
            );
          
          if($statement){

            $query = "UPDATE produto SET   estoque_atual=:estoque_atual WHERE id_produto = :id";
            $statement = $conexao->prepare($query);
            $statement->execute(
              array(

                ':id' => $produtoid,
                ':estoque_atual' => ($estoque_atual-$quantidade),
                )
              );


          }else{
                                      //echo '<div class="naosucesso">Não cadastrado</div>';
                                      //$status="Não cadastrado";
                                      //echo "<meta http-equiv=\"refresh\" content=\"0;url=produtos.php?status=".$status."\">"; 
          }   
          


        }else{

          ?>
                                    <!-- <div class="alert alert-success" role="alert">
                                      <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
                                    </div>
                                    <div class="alert alert-info" role="alert">
                                      <strong>Heads up!</strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
                                    </div>
                                    <div class="alert alert-warning" role="alert">
                                      <strong>Warning!</strong> Better check yourself, you're <a href="#" class="alert-link">not looking too good</a>.
                                    </div> -->
                                    <div class="alert alert-danger" role="alert">
                                      <strong>Alerta!</strong> <a href="#" class="alert-link"></a> A quantidade a Ser Retirada é MAIOR do que a existente no estoque.
                                    </div>
                                    <div class="alert alert-warning" role="alert">
                                      <strong>Aviso!</strong> <a href="#" class="alert-link"></a>Estoque atual: <?=$estoque_atual?>
                                    </div>

                                    <?php

                                  }  

                                  
                                }

                                ?>

                                <form class="form-horizontal" action='pdf/saidapdf.php?id=<?=$_GET['id']?>' method="post" target="_blank">

                                  <!-- <form class="form-horizontal" action='test.php?id=<?=$_GET['id']?>' method="post" target="_blank">  -->
                                  
                                  <table class="table table-hover table-bordered">                
                                    <tbody>                                  
                                      <tr>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Data</th>
                                        <th></th>
                                      </tr>
                                    </tbody>
                                    <tfoot>
                                     <br>
                                   </tfoot>

                                   <?php

              // para excluir e voltar quantidade anterior 
                                   if(isset($_GET['rem'])){

                                    $iddeleta=$_GET['rem'];


                                    $rs = $conexao->query("SELECT id_card, produto, quantidade FROM card WHERE id_card='$iddeleta' ");

                                    while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {  

                                     $id_card=$row["id_card"];
                                     $id_p=$row["produto"];
                                     $p_quant=$row["quantidade"]; 
                                   }   

                                   $rs = $conexao->query("SELECT  estoque_atual FROM produto WHERE id_produto='$id_p' ");

                                   while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {  

                                     $estoque_atual=$row["estoque_atual"];

                                   }             


                                   $query = "UPDATE produto SET  estoque_atual=:estoque_atual WHERE id_produto = :id";
                                   $statement = $conexao->prepare($query);
                                   $statement->execute(
                                    array(

                                      ':id' => $id_p,
                                      ':estoque_atual' =>($estoque_atual+$p_quant),
                                      )
                                    );

                                   $rs = $conexao->query("DELETE FROM card WHERE id_card='$id_card'"); 
                                 }

                                 if(isset($_GET['id'])){

                                  $clienteid=$_GET['id'];
                                  $totalp=0;

                                  $rs = $conexao->query("SELECT c.id_card, c.retirante, p.nome as 'produto', c.quantidade, c.data  FROM card as c, produto as p WHERE c.produto=p.id_produto and c.retirante='$clienteid' ");

                                  while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {  

                                    echo "<tr";
                                    echo "<br>";
                                    echo "<td>" . utf8_encode($row["produto"]) . "</td>";
                                    echo "<td>" . $row["quantidade"] . "</td>";
                                    echo "<td>" . $row["data"] . "</td>";
                                    echo "<td ><a href='saidamaterial.php?id=".$row["retirante"]."&rem=".$row["id_card"]."'><button type='button' class='btn btn-danger col-md-10'><i class='fa fa-trash-o'></i></button></a></td>";
                                    echo "</tr>";

                                    $totalp=$totalp+$row["quantidade"];

                                  }               
                                }

                                ?>   
                              </table>

                              <div class="form-group pull-right" >
                                <label class="col-md-5 control-label " for="textinput">Total Saída:</label>  
                                <div class="col-md-5 ">               
                                 <input  name="" class="form-control input-md" type="text" value='<?=$totalp?>' disabled> 
                               </div>
                             </div> 

                             <div class="form-group ">
                              <label class="col-md-4 control-label" for="button1id"></label>
                              <div class="col-md-8">

                                <td colspan="6" style="text-align: left;">
                                  <button type='submit' name="final" value="" onclick="MudaDePagina();"  class="btn btn-success btn-lg" ><i class='fa fa-credit-card' > Casdastrar Saída de Material</i></button>  
                                </td>                                 
                              </div>
                            </div> 
                          </form>  

                          <script type="text/javascript">
                          function MudaDePagina() {
                            window.setTimeout("location.href ='saidamaterial.php?status=Cadastro de saída realizado com Sucesso!'",1500);
                          }
                          </script>


                          <!-- jQuery -->

                          <script src="../bower_components/jquery/dist/jquery.min.js"></script>

                          <!-- Bootstrap Core JavaScript -->
                          <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

                          <!-- Metis Menu Plugin JavaScript -->
                          <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

                          <!-- DataTables JavaScript -->
                          <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
                          <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
                          <script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

                          <!-- Custom Theme JavaScript -->
                          <script src="../dist/js/sb-admin-2.js"></script>

                          <!-- Page-Level Demo Scripts - Tables - Use for reference -->
                          <script>
                          $(document).ready(function() {
                            $('#dataTables-example').DataTable({
                              responsive: true
                            });
                          });
                          </script>
                        </body>

                        </html>
