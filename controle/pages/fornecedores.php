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
?>
<!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SisCoM - Sistema de Controle Material</title>

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

        <div id="wrapper">

         <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <img class="profile-img" src="../img/brasao.png" width="50" height=""> SisCoM - Sistema de Controle Material.
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">Divisão de Material e Patrimônio - DMP
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['apelido']." "; ?><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>  Alterar Senha</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-barcode fa-fw"></i> Produtos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="categorias.php">Listar Categoria</a>
                                </li>
                                <li>
                                    <a href="produtos.php">Listar Produto</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-inbox fa-fw"></i> Estoque<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="entradamaterial.php">Entrada de Material</a>
                                </li>
                                <li>
                                    <a href="saidamaterial.php">Saída de Material</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="fornecedores.php"><i class="fa fa-file-text-o fa-fw"></i> Fronecedores</a>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="retirantes.php"><i class="fa fa-share-square-o fa-fw"></i> Retirantes</a>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Relat&oacute;rios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="#">Produtos</a></li>
                                <li><a href="#">Fornecedores</a></li>
                                <li><a href="#">Retirantes</a></li>
                                <li><a href="#">Entrada</a></li>
                                <li><a href="#">Saida</a></li>
                            </ul>


                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Usu&aacute;rio<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="usuario.php">Cadastro</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>             

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           <small></small>
                       </h1>
                       <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-file-text-o"></i><b> Dashboard > Fornecedor <?php if(isset($_GET['id'])){ echo " > Editar";} ?></b>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">


                    <?php    
                    if(isset($_GET['status']))  
                    {  

                       echo '<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$_GET['status'].'</div> ';  
                   }  

                   if(empty($_GET['id'])){
                    ?>

                    <button type='button' class="btn btn-success btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class='fa fa-plus'> Cadastrar Fornecedor</i></button>   
                    <br>
                    <br>
                </div>
                <!-- /.col-lg-12 -->
                
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Listagem dos Fornecedores!
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                               <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome:</th>
                                        <th>Telefone</th>
                                        <th>Estado/Cidade</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include("../include/conexao.php");

                                    $rs = $conexao->query("SELECT  id_fornecedor, nome, telefone, estado, cidade FROM fornecedor");

                                    while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

                                        echo "<tr class='gradeX'";
                                        echo "<br>";
                                        echo "<td>" . $row["id_fornecedor"] . "</td>";
                                        echo "<td>" . utf8_encode($row["nome"]) . "</td>";
                                        echo "<td>" . $row["telefone"]. "</td>";
                                        echo "<td>" . utf8_encode($row["cidade"]." - ".$row["estado"]). "</td>";
                                        echo "<td ><a href='?id=".$row["id_fornecedor"]."'><button type='button' class='btn btn-primary'><i class='fa fa-pencil'></i></button></a></td>";
                                        echo "</tr>";
                                    }                                          

                                    ?>               

                                </tbody>
                            </table>

                        </div>

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>


        <?php

            }//fecha if para exibir tabela

            if(isset($_GET['id'])){

                $id=($_GET['id']);
                include("../include/conexao.php");
                $rs = $conexao->query("SELECT  id_fornecedor, nome, telefone, estado, cidade FROM fornecedor WHERE id_fornecedor='$id'");

                while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

                    $f_id=$row["id_fornecedor"];
                    $f_nome=utf8_encode($row["nome"]);
                    $f_telefone=$row["telefone"];
                    $f_estado=$row["estado"];
                    $f_cidade=utf8_encode($row["cidade"]);
                }  


                ?>
                


                <div class="row">
                    <div class="col-lg-7">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Editar Fornecedor
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <!-- <form class="form-horizontal" role="form"  method="post" action="/controle/funfornecedor.php" > -->
                                    <form class="form-horizontal" role="form"  method="post" action="fornecedores.php" >
                                        
                                        <div class="form-group">
                                          <label class="col-md-4 control-label" for="textinput">ID:</label>  
                                          <div class="col-md-1">
                                              <input value='<?=$f_id?>' id="textinput" name="id" placeholder="Nome Completo" class="form-control input-md" required="" type="text" readonly="readonly">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-md-4 control-label" for="textinput">Nome:*</label>  
                                          <div class="col-md-5">
                                              <input value='<?=$f_nome?>' id="textinput" name="produto" placeholder="Nome Completo" class="form-control input-md" required="" type="text">

                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-md-4 control-label" for="textinput">Telefone*</label>  
                                          <div class="col-md-5">
                                              <input value='<?=$f_telefone?>' id="textinput" name="produto" placeholder="Nome Completo" class="form-control input-md" required="" type="text">

                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-md-4 control-label" for="textinput">Cidade:*</label>  
                                          <div class="col-md-5">
                                              <input value='<?=$f_cidade?>' id="textinput" name="produto" placeholder="Nome Completo" class="form-control input-md" required="" type="text">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-md-4 control-label" for="textinput">Estado:*</label>  
                                        <div class="col-md-3">
                                            <select  name="estado" class="form-control" id="options" required="">
                                                <option value="<?=$f_estado?>"><?=$f_estado?></option> 
                                                <option value="Acre">Acre</option> 
                                                <option value="Alagoas">Alagoas</option> 
                                                <option value="Amazonas">Amazonas</option> 
                                                <option value="Amapá">Amapá</option> 
                                                <option value="Bahia">Bahia</option> 
                                                <option value="ce">Ceará</option> 
                                                <option value="Ceará">Distrito Federal</option> 
                                                <option value="Espírito Santo">Espírito Santo</option> 
                                                <option value="Goiás">Goiás</option> 
                                                <option value="ma">Maranhão</option> 
                                                <option value="Maranhão">Mato Grosso</option> 
                                                <option value="Mato Grosso do Sul">Mato Grosso do Sul</option> 
                                                <option value="Minas Gerais">Minas Gerais</option> 
                                                <option value="Pará">Pará</option> 
                                                <option value="Paraíba">Paraíba</option> 
                                                <option value="Paraná">Paraná</option> 
                                                <option value="Pernambuco">Pernambuco</option> 
                                                <option value="Piauí">Piauí</option> 
                                                <option value="Rio de Janeiro">Rio de Janeiro</option> 
                                                <option value="Rio Grande do Norte">Rio Grande do Norte</option> 
                                                <option value="Rondônia">Rondônia</option> 
                                                <option value="Rio Grande do Sul">Rio Grande do Sul</option> 
                                                <option value="Roraima">Roraima</option> 
                                                <option value="Santa Catarina">Santa Catarina</option> 
                                                <option value="Sergipe">Sergipe</option> 
                                                <option value="São Paulo">São Paulo</option> 
                                                <option value="Tocantins">Tocantins</option> 
                                            </select>  
                                        </div>
                                    </div> 

                                    <!-- Button (Double) -->
                                    <div class="form-group">
                                      <label class="col-md-4 control-label" for="button1id"></label>
                                      <div class="col-md-8">
                                        <a href='fornecedores.php'><button type='button' class="btn btn-danger"><i class='fa fa-reply'> Voltar</i></button></a> 
                                        <button id="button1id" name="button1id" class="btn btn-success">Atualizar Dados Fornecedor</button>                                    
                                    </div>
                                </div> 

                                
                            </form>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <?php
    }
    ?>

</div>


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
 <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"> <i class='fa fa-archive'></i> Cadastro de Fornecedor</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal"  method="post" action="fornecedores.php" >
        <!-- <form class="form-horizontal"  method="post" action="controle/funfornecedor.php" > -->

        <fieldset>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Nome Fornecedor:*</label>  
                <div class="col-md-5">
                    <input id="textinput" name="produto" placeholder="Descrição" class="form-control input-md" required="" type="text">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Telefone:*</label>  
              <div class="col-md-4">
                  <input value='' id="phone2" name="telefone1" placeholder="(__)____-____" class="form-control" type="text" required>       
              </div>
          </div>

          <script type="text/javascript">
          jQuery(function($){
             $("#phone").mask("(99) 99999-9999");
             $("#phone2").mask("(99) 9999-9999");        
         });               
          </script>

          <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Cidade*</label>  
              <div class="col-md-5">
                  <input value='' id="textinput" name="produto" placeholder="Ex: Rio Branco" class="form-control input-md" required="" type="text">      
              </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Estado:*</label>  
            <div class="col-md-3">
                <select  name="estado" class="form-control" id="options" required="">
                    <option value="">Selecione o Estado</option> 
                    <option value="Acre">Acre</option> 
                    <option value="Alagoas">Alagoas</option> 
                    <option value="Amazonas">Amazonas</option> 
                    <option value="Amapá">Amapá</option> 
                    <option value="Bahia">Bahia</option> 
                    <option value="ce">Ceará</option> 
                    <option value="Ceará">Distrito Federal</option> 
                    <option value="Espírito Santo">Espírito Santo</option> 
                    <option value="Goiás">Goiás</option> 
                    <option value="ma">Maranhão</option> 
                    <option value="Maranhão">Mato Grosso</option> 
                    <option value="Mato Grosso do Sul">Mato Grosso do Sul</option> 
                    <option value="Minas Gerais">Minas Gerais</option> 
                    <option value="Pará">Pará</option> 
                    <option value="Paraíba">Paraíba</option> 
                    <option value="Paraná">Paraná</option> 
                    <option value="Pernambuco">Pernambuco</option> 
                    <option value="Piauí">Piauí</option> 
                    <option value="Rio de Janeiro">Rio de Janeiro</option> 
                    <option value="Rio Grande do Norte">Rio Grande do Norte</option> 
                    <option value="Rondônia">Rondônia</option> 
                    <option value="Rio Grande do Sul">Rio Grande do Sul</option> 
                    <option value="Roraima">Roraima</option> 
                    <option value="Santa Catarina">Santa Catarina</option> 
                    <option value="Sergipe">Sergipe</option> 
                    <option value="São Paulo">São Paulo</option> 
                    <option value="Tocantins">Tocantins</option> 
                </select>  
            </div>
        </div>

    </fieldset>
    <div class="modal-footer">
        <a href='fornecedores.php'><button type='button' class="btn btn-danger"><i class='fa fa-reply'> Voltar</i></button></a>  
        <button id="button2id" type="reset" name="button2id" class="btn btn-default">Limpar</button> 
        <button id="button1id" name="button1id" class="btn btn-success">Cadastrar</button>
    </div>

    
</form>
</div>
</div>
</div>
</div>

<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

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
        responsive: true,
        "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar:",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                }
        }
    });
});
</script>
</body>
<div class="footer">
 <center> © 2017 IMAC - Instituto de Meio Ambiente do Acre. </center>
</div>
</html>