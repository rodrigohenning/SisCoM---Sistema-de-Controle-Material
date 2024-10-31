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

           <!-- Navigation -->
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
                            <i class="fa fa-barcode"></i><b> Dashboard > Produto <?php if(isset($_GET['id'])){ echo " > Editar";} ?></b>
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

                    <button type='button' class="btn btn-success btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class='fa fa-plus'> Adicionar Produto </i></button>   
                    <br>
                    <br>
                </div>
                <!-- /.col-lg-12 -->

            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Listagem dos Produtos!
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Categoria</th>                         
                                            <th>Estoque/Mínimo</th>
                                            <th>Estoque Atual</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include("../include/conexao.php");

                                        $rs = $conexao->query("SELECT  p.id_produto, c.nome as 'categoria', p.nome, p.estoque_minimo, p.estoque_atual 
                                            FROM produto as p, categoria as c WHERE p.categoria=c.id_categoria");

                                        while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

                                            echo "<tr class='gradeX'";
                                            echo "<br>";
                                            echo "<td>" . $row["id_produto"] . "</td>";
                                            echo "<td>" . utf8_encode($row["nome"]) . "</td>";
                                            echo "<td>" . utf8_encode($row["categoria"]) . "</td>";
                                            echo "<td>" . $row["estoque_minimo"] . "</td>";
                                             echo "<td>" . $row["estoque_atual"] . "</td>";
                                            echo "<td ><a href='?id=".$row["id_produto"]."'><button type='button' class='btn btn-primary'><i class='fa fa-pencil'></i></button></a></td>";
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
                $rs = $conexao->query("SELECT  id_produto, categoria, nome, estoque_minimo FROM produto WHERE id_produto='$id'");

                while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

                    $p_id=$row["id_produto"];
                    $p_descricao=utf8_encode($row["nome"]);
                    $p_categoria=$row["categoria"];
                    $p_estoqueminimo=$row["estoque_minimo"];
                }  

                ?>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Edição das Informações do Produto!
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <form class="form-horizontal" role="form"  method="post" action="controle/funproduto.php" >

                                        <!-- Text input-->
                                        <div class="form-group">
                                          <label class="col-md-3 control-label" for="textinput">Código Produto:</label>  
                                          <div class="col-md-2">
                                              <input value='<?=$p_id?>' id="textinput" name="id_e" placeholder="Nome Completo" class="form-control input-md" required="" type="text" readonly="readonly">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-md-3 control-label" for="textinput">Nome:*</label>  
                                          <div class="col-md-5">
                                              <input value='<?=$p_descricao?>' id="textinput" name="nome_e" placeholder="Nome Completo" class="form-control input-md" required="" type="text">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label class="col-md-3 control-label" for="textinput">Categoria:*</label>  
                                          <div class="col-md-5">

                                            <select  name="categoria_e" class="form-control" id="" onchange="optionCheck()" required="">
                                                <option value="" >Selecione uma Categoria...</option>
                                                <?php
                                                include("../include/conexao.php");

                                                $rs = $conexao->query("SELECT DISTINCT id_categoria, nome FROM categoria order by nome ASC");

                                                while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

                                                    $pid=$row["id_categoria"];                     
                                                    $pdescricao=utf8_encode($row["nome"]);

                                                    echo '<option value="'.$pid.'">'.$pdescricao.'</option>';                                    
                                                }           
                                                ?>

                                            </select>  
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-md-3 control-label" for="textinput">Estoque Mínimo:*</label>  
                                      <div class="col-md-2">
                                          <input value='<?=$p_estoqueminimo?>' id="textinput" name="estoqueminimo_e" placeholder="Nome Completo" class="form-control input-md" required="" type="number">

                                      </div>
                                  </div>
                                  <!-- Button (Double) -->
                                  <div class="form-group">
                                      <label class="col-md-3 control-label" for="button1id"></label>
                                      <div class="col-md-8">
                                        <a href='produtos.php'><button type='button' class="btn btn-danger"><i class='fa fa-reply'> Voltar</i></button></a> 
                                        <button id="button1id" name="button1id" class="btn btn-success">Atualizar Produto</button>                                    
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
        <h4 class="modal-title" id="exampleModalLabel"> <i class='fa fa-archive'></i> Cadastro de Produto</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal"  method="post" action="controle/funproduto.php" >

        <fieldset>


            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Nome:*</label>  
              <div class="col-md-5">
                  <input value='' id="textinput" name="nome_p" placeholder="Descrição" class="form-control input-md" required="" type="text">
              </div>
          </div>

          <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Categoria:*</label>  
              <div class="col-md-5">

                <select  name="categoria_p" class="form-control" id="" onchange="optionCheck()" required="">
                    <option value="" >Selecione uma Categoria...</option>
                    <?php
                    include("../include/conexao.php");

                    $rs = $conexao->query("SELECT DISTINCT id_categoria, nome FROM categoria order by nome ASC");

                    while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

                        $pid=$row["id_categoria"];                     
                        $pdescricao=utf8_encode($row["nome"]);

                        echo '<option value="'.$pid.'">'.$pdescricao.'</option>';                                    
                    }           
                    ?>          
                </select>  
            </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Estoque Mínimo:*</label>  
          <div class="col-md-2">
              <input value='' id="textinput" name="estoqueminimo_p" placeholder="" class="form-control input-md" required="" type="number">

          </div>
      </div>

  </fieldset>
  <div class="modal-footer">
    <a href='produtos.php'><button type='button' class="btn btn-danger"><i class='fa fa-reply'> Voltar</i></button></a>  
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
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo:",
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
