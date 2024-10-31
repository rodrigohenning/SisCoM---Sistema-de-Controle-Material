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
                                <i class="fa fa-shopping-cart"></i><b> Dashboard > Saída de Material</b>
                            </li>
                        </ol>
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
                    </div>
                    <!-- /.col-lg-12 -->
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Selecione um Retirante!
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                   <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Setor </th>
                                            <th>Nome Retirante</th>
                                            <th class="col-lg-1" >Selecionar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include("../include/conexao.php");

                                        $rs = $conexao->query("SELECT  r.id_retirante, r.nome, s.sigla as 'sigla', s.nome as 'nomesigla' FROM retirante as r, setor as s WHERE r.setor=s.id_setor order by s.sigla");

                                        while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

                                            echo "<tr class='gradeX'";
                                            echo "<br>";
                                            echo "<td>" . utf8_encode($row["sigla"]." - ".$row["nomesigla"]). "</td>";
                                            echo "<td>" . utf8_encode($row["nome"]) . "</td>";
                                            echo "<td ><a href='saidamaterial.php?id=".$row["id_retirante"]."'><button type='button' class='btn btn-primary col-md-10'><i class='fa fa-shopping-cart'></i></button></a></td>";
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
        }

        if(isset($_GET['id'])){

            $id=($_GET['id']);
            include("../include/conexao.php");
            $rs = $conexao->query("SELECT  r.id_retirante, r.nome, s.sigla as 'sigla', s.nome as 'nomesigla' FROM retirante as r, setor as s WHERE r.setor=s.id_setor and r.id_retirante='$id' order by s.sigla");

            while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

                $r_setor=utf8_encode($row["sigla"]." - ".$row["nomesigla"]);                     
                $r_nome=utf8_encode($row["nome"]);

            }  


            ?>


            <div class="row">
             <div class="col-lg-12">

              <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados do Retirante.
                        </div>

                        <div class="panel-body">


                          <form class="form-horizontal">    
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="disabledSelect" >Setor/Divisão:</label>  
                              <div class="col-md-8">
                                  <input  value='<?=$r_setor?>' class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>      
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-md-3 control-label" for="disabledSelect">Nome:</label>  
                              <div class="col-md-8">
                                  <input  value='<?=$r_nome?>' class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>                 
                              </div>
                          </div>      
                      </form>


                  </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                    Material.
                </div>

                <div class="panel-body">

                    <form class="form-horizontal" action="" method="post" id="form_prepare"  >


                     <?php

                     if(empty($_GET['catg'])) {

                        ?>

                        <div class="form-group">
                          <label class="col-md-3 control-label" for="textinput">Categoria:*</label>  
                          <div class="col-md-5">

                            <select  name="" class="form-control" id="options" onChange="muda_cat(value,'<?php basename($_SERVER['REQUEST_URI']);?>');" required="">
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

                    <?php
                }else{                    
                    ?>

                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textinput">Categoria:*</label>  
                      <div class="col-md-5">

                        <select  name="" class="form-control" id="options" onChange="muda_cat(value,'<?php basename($_SERVER['REQUEST_URI']);?>');" required="">
                            <?php
                            $var=$_GET['catg'];

                            include("../include/conexao.php");
                            $rs = $conexao->query("SELECT DISTINCT id_categoria, nome FROM categoria WHERE id_categoria='$var'");

                            while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

                                $pid=$row["id_categoria"];                     
                                $pdescricao=utf8_encode($row["nome"]);
                                echo '<option value="'.$pid.'">'.$pdescricao.'</option>'; 
                            }    

                            $rs = $conexao->query("SELECT DISTINCT id_categoria, nome FROM categoria WHERE id_categoria!='$pid' order by nome ASC");

                            while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

                                $pid=$row["id_categoria"];                     
                                $pdescricao=utf8_encode($row["nome"]);
                                echo '<option value="'.$pid.'">'.$pdescricao.'</option>'; 
                            }   
                            ?>
                        </select>  
                    </div>
                </div>



                <?php
            }               
            ?>

            <div class="form-group">
              <label class="col-md-3 control-label" for="textinput">Produto:*</label>  
              <div class="col-md-5">

                <select  name="produto" class="form-control" id="options"  required="">

                    <?php
                    include("../include/conexao.php");

                    $rs = $conexao->query("SELECT DISTINCT id_produto, nome FROM produto WHERE categoria='$var' order by nome ASC");

                    while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                        $pid=$row["id_produto"];                     
                        $pdescricao=utf8_encode($row["nome"]);
                        echo '<option value="'.$pid.'">'.$pdescricao.'</option>';                                    
                    }           
                    ?>                    
                </select>  
            </div>
        </div>

        <script language="javascript">

        function muda_cat()
        {
          var argv = muda_cat.arguments;
          var argc = argv.length;
          var id = "<?php print $id; ?>";

          open(argv[1] + "saidamaterial.php?id="+id+"&catg=" + argv[0], "_self");
// comentando argumento 1 do select e o argumento 0 do select que normalmente é o id, a pagina abre nela propria
}
</script>


<div class="form-group">
  <label class="col-md-3 control-label" for="textinput">Quantidade:*</label>  
  <div class="col-md-2">
      <input value='' id="textinput" name="quantidade" placeholder="" min="1" max="50" class="form-control input-md" required="" type="number">
      
  </div>
</div>





<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <a href='saidamaterial.php'><button type='button' class="btn btn-danger"><i class='fa fa-reply'> Voltar</i></button></a> 

    <td colspan="6" style="text-align: left;">
        <button class="btn btn-large btn-primary" type="submit" >Adiconar a lista</button> 
    </td>                                 
</div>
</div>                            
</form>


</div>

</div>

</div>

<div class="col-lg-6">

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista Materiais.
        </div>
        
        <div class="panel-body">

            <?php
            require("card.php");
            ?>
            
        </div>
        
    </div>
    
</div>             
</div>
<!-- /.col-lg-6 -->

</div>
</div>

<?php
}
?>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
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
