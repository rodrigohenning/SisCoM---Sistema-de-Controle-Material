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

require("controle/variaveis.php");
?>
<!DOCTYPE html>
<!--  Autor= Rodrigo Henning 
      Data:20-07-2017
  -->
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
    								<i class="fa fa-dashboard "></i> <b>Dashboard</b>
    							</li>
    						</ol>
    					</div>
    					<!-- /.col-lg-12 -->
    				</div>
    				<!-- /.row -->



    				<div class="row">
    					<div class="col-lg-12">
    						<div class="panel panel-green">
    							<div class="panel-heading">
    								Painel de Informações!
    							</div>
    							<!-- /.panel-heading -->
    							<div class="panel-body">
    								<div class="dataTable_wrapper">



    									<div class="col-lg-3 col-md-6">
    										<div class="panel panel-green">
    											<div class="panel-heading">
    												<div class="row">
    													<div class="col-xs-3">
    														<i class="fa fa-barcode fa-5x"></i>
    													</div>
    													<div class="col-xs-9 text-right">
    														<div class="huge"><?=$totalProdutos?></div>
    														<div>Produtos Cadastrados!</div>
    													</div>
    												</div>
    											</div>
    											<a href="produtos.php">
    												<div class="panel-footer">
    													<span class="pull-left">Cadastrar Produto</span>
    													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
    													<div class="clearfix"></div>
    												</div>
    											</a>
    										</div>
    									</div>


    									<div class="col-lg-3 col-md-6">
    										<div class="panel panel-primary">
    											<div class="panel-heading">
    												<div class="row">
    													<div class="col-xs-3">
    														<i class="fa fa-share-square-o  fa-5x"></i>
    													</div>
    													<div class="col-xs-9 text-right">
    														<div class="huge"><?=$totalRetirantes?></div>
    														<div>Retirantes Cadastrados!</div>
    													</div>
    												</div>
    											</div>
    											<a href="retirantes.php">
    												<div class="panel-footer">
    													<span class="pull-left">Cadastrar Retirante</span>
    													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
    													<div class="clearfix"></div>
    												</div>
    											</a>
    										</div>
    									</div>

    									<div class=" col-md-6">
    										<div class="panel panel-red">
    											<div class="panel-heading ">

    												<div class="row">
    													<div class="col-xs-3">
    														<i class="fa fa-warning fa-5x"></i>
    													</div>
    													<div class="col-xs-9 text-right">
    														<div class="huge"><?=$totalMinimo?></div>
    														<div>Total Produtos com Estoque Mínimo!</div>
    													</div>
    												</div>

    											</div>
    											<!-- /.panel-heading -->
    											<div class="panel-body">                       
    												<div class="dataTable_wrapper">

    													<?php 

    													include("../include/conexao.php");

    													$rs = $conexao->query("SELECT  id_produto, nome, estoque_minimo, estoque_atual FROM produto WHERE estoque_minimo>estoque_atual");

    													while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

    														echo "<a href='' class='list-group-item'>";
    														echo "<i class='fa fa-warning fa-fw'></i> ".utf8_encode($row["nome"])."";
    														echo "<span class='pull-right text-muted small'><em>Estoque Atual: ".$row["estoque_atual"]."</em>";
    														echo "</span>";
    														echo "</a>";  
    													}                                                  
    													?>             

    												</div>
    												<!-- /.table-responsive -->
    											</div>
    											<!-- /.panel-body -->
    										</div>
    										<!-- /.panel -->
    									</div>


    									<div class=" col-md-6">
    										<div class="panel panel-yellow">
    											<div class="panel-heading ">

    												<div class="row">
    													<div class="col-xs-3">
    														<i class="fa fa-shopping-cart fa-5x"></i>
    													</div>
    													<div class="col-xs-9 text-right">
    														<div class="huge"><?=$totalCard?></div>
    														<div>Total de Produtos não Assinados!</div>
    													</div>
    												</div>

    											</div>
    											<!-- /.panel-heading -->
    											<div class="panel-body">                       
    												<div class="dataTable_wrapper">

    													<?php 

    													include("../include/conexao.php");
    													$tt=0;
    													$rs = $conexao->query("SELECT DISTINCT r.nome, c.retirante as 're' FROM card as c, retirante as r WHERE c.retirante=r.id_retirante");

    													while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {

    														$RR=$row["re"];

    														$rs1 = $conexao->query("SELECT SUM(quantidade) AS valor_soma FROM card WHERE retirante='$RR' ");
    														while ($row1 = $rs1->fetch(PDO::FETCH_ASSOC)) {
    															$tt=$row1["valor_soma"];
    														}

    														echo "<a href='' class='list-group-item'>";
    														echo "<i class='fa fa-warning fa-fw'></i> ".utf8_encode($row["nome"])."";
    														echo "<span class='pull-right text-muted small'><em>Total Produtos Solicitados: ".$tt."</em>";
    														echo "</span>";
    														echo "</a>";  
    													}                                                  
    													?>             

    												</div>
    												<!-- /.table-responsive -->
    											</div>
    											<!-- /.panel-body -->
    										</div>
    										<!-- /.panel -->
    									</div>




    								</div>
    								<!-- /.table-responsive -->
    							</div>
    							<!-- /.panel-body -->
    						</div>
    						<!-- /.panel -->
    					</div>
    					<!-- /.col-lg-12 -->
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

    	<!-- Custom Theme JavaScript -->
    	<script src="../dist/js/sb-admin-2.js"></script>

    </body>
    <div class="footer">
    	<center> © 2017 IMAC - Instituto de Meio Ambiente do Acre. </center>
    </div>

    </html>
