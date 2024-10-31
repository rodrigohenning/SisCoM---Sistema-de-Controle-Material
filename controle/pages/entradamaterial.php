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


        <script language="javascript">

        function muda_cat()
        {
        	var argv = muda_cat.arguments;
        	var argc = argv.length;

        	open(argv[1] + "entradamaterial.php?catg=" + argv[0], "_self");
// comentando argumento 1 do select e o argumento 0 do select que normalmente é o id, a pagina abre nela propria
}
</script>


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
								<i class="fa fa-inbox"></i><b> Dashboard > Entrada de Material </b> 
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
						?>                            

						<?php


						?>
					</div>

					<div class="row">
						<div class="col-lg-9">
							<div class="panel panel-primary">
								<div class="panel-heading">
									Insira as informações para entrada de Material
								</div>
								<!-- /.panel-heading -->
								<div class="panel-body">
									<div class="dataTable_wrapper">
										<form class="form-horizontal" role="form"  method="post" action="controle/funentrada.php" >


											<div class="form-group">
												<label class="col-md-3 control-label" for="textinput">Data Entrada:*</label>  
												<div class="col-md-2">
													<input value='<?= date('d/m/y')?>' id="textinput" name="dataentrada" placeholder="Nome Completo" class="form-control input-md" required="" type="text">

												</div>
											</div>

											<?php

											if(empty($_GET['catg'])) {

												?>

												<div class="form-group">
													<label class="col-md-3 control-label" for="textinput">Categoria:*</label>  
													<div class="col-md-5">

														<select  name="categoria" class="form-control" id="options" onChange="muda_cat(value,'<?php basename($_SERVER['REQUEST_URI']);?>');" required="">
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

														<select  name="categoria" class="form-control" id="options" onChange="muda_cat(value,'<?php basename($_SERVER['REQUEST_URI']);?>');" required="">
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

												open(argv[1] + "entradamaterial.php?id="+id+"&catg=" + argv[0], "_self");
                // comentando argumento 1 do select e o argumento 0 do select que normalmente é o id, a pagina abre nela propria
            }
            </script>



            <div class="form-group">
            	<label class="col-md-3 control-label" for="textinput">Fornercedor:*</label>  
            	<div class="col-md-5">

            		<select  name="fornecedor" class="form-control" id="options"  required="">
            			<option value="" >Selecione um Fornecedor...</option>
            			<?php
            			include("../include/conexao.php");

            			$rs = $conexao->query("SELECT DISTINCT id_fornecedor, nome FROM fornecedor order by nome ASC");

            			while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
            				$pid=$row["id_fornecedor"];                     
            				$pdescricao=utf8_encode($row["nome"]);
            				echo '<option value="'.$pid.'">'.$pdescricao.'</option>';                                    
            			}           
            			?>                    
            		</select>  
            	</div>
            </div>

            <div class="form-group">
            	<label class="col-md-3 control-label" for="textinput">Quantidade:*</label>  
            	<div class="col-md-2">
            		<input value='' id="textinput" name="quantidade" placeholder="" class="form-control input-md" required="" min="1" max="5000" type="number">

            	</div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
            	<label class="col-md-3 control-label" for="textarea">Descrição:</label>
            	<div class="col-md-5">                     
            		<textarea value='' class="form-control" id="textarea" name="descricao" ></textarea>
            		<small class="form-text text-muted">*Campos obrigatório</small>
            	</div>
            </div>



            <!-- Button (Double) -->
            <div class="form-group">
            	<label class="col-md-4 control-label" for="button1id"></label>
            	<div class="col-md-8">
            		<!-- <a href='produtos.php'><button type='button' class="btn btn-danger"><i class='fa fa-reply'> Voltar</i></button></a>  -->
            		<button id="button1id" name="button1id" class="btn btn-success">Cadastrar entrada de Produto</button>                                    
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
		responsive: true
	});
});
</script>
</body>
<div class="footer">
	<center> © 2017 IMAC - Instituto de Meio Ambiente do Acre. </center>
</div>

</html>
