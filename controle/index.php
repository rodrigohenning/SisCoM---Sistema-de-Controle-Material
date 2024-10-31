	<?php
	session_start();
	session_destroy();
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
		<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="dist/css/sb-admin-2.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	        <![endif]-->

	    </head>

	    <body>

	    	<div class="container">
	    		<div class="row">
	    			<div class="col-md-4 col-md-offset-4">
	    				<div class="login-panel panel panel-default">
	    					<div class="panel-heading">
	    						<center><img class="profile-img" src="img/brasao.png" width="150" height="">
	    							<br><br><h3 class="panel-title">SisCoM <br> Sistema de Controle Material.</h3></center>
	    						</div>
	    						<div class="panel-body">
	    							<?php
	    							if(isset($_GET['menssage']))
	    							{
	    								echo '<div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.utf8_encode($_GET['menssage']).'</div> ';
	    							}
	    							?>
	    							<form role="form" action="login.php" method="post">
	    								<fieldset>
	    									<div class="form-group">
	    										<input class="form-control" placeholder="Login" name="login" type="text"  autofocus required="">
	    									</div>
	    									<div class="form-group">
	    										<input class="form-control" placeholder="Senha" name="senha" type="password" value="" required="">
	    									</div>
	    									<div class="checkbox">
	    										<label>
	    											<input name="remember" type="checkbox" value="Remember Me">Lembrar Me
	    										</label>
	    									</div>

	    									<div class="form-group">
	    										<label></label>
	    										<input type="submit" class="btn btn-lg btn-success btn-block" value="Acessar">
	    									</div>
	    								</fieldset>
	    							</form>
	    						</div>
	    						<center> Divisão de Material e Patrimônio - DMP <!-- <br>Todos os direitos reservados. --> </center>
	    					</div>

	    				</div>

	    			</div>
	    		</div>



	    		<!-- jQuery -->
	    		<script src="bower_components/jquery/dist/jquery.min.js"></script>

	    		<!-- Bootstrap Core JavaScript -->
	    		<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	    		<!-- Metis Menu Plugin JavaScript -->
	    		<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

	    		<!-- Custom Theme JavaScript -->
	    		<script src="dist/js/sb-admin-2.js"></script>

	    	</body>
	    	<div class="footer">
	    		<center> © 2017 IMAC - Instituto de Meio Ambiente do Acre. </center>
	    	</div>
	    	</html>
