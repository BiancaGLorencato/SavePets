<?php
include ("conexao.php");
?>

<html lang="pt-br">
<head>
<link rel="stylesheet" href="in.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="in.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<script src="js/javascript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

	<title> Index </title>




</head>
<body>
<font = style color: white; text-shadow: black 0.1em 0.1em 0.2em>
<section class="header">
	<!--menu mobile-->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#links-menu" style="background-color: white;">
					<i class="material-icons">menu</i>

				</button>
				<div class= "navbar-header">
							<a class ="navbar-brand" href="index.php">Save Pets</a>

						</div>
				</div>
	<nav id="links-menu" class="collapse navbar-collapse">
	<!--fim menu mobile-->
	<!--Menu-->
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li><a href="animaisA.php">Adoção</a></li>
			<li><a href="animaisE.php">Animais Encontrados nas Ruas</a></li>
			<li><a href="animaisP.php">Animais Perdidos</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php
			session_start();
			if(!isset($_SESSION['login']) || !isset($_SESSION['senha'])){
				echo  '
					<li><a href="cadastrar.php"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				';

				//se a pessoa não estiver logada aparece so login e para se cadastrar.
				}

		else{
			$nome=$_SESSION['login'];
			echo '
				<li><a href="#"></a></li>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>Olá '.$nome.' <span class="caret"></span></a>
					<ul class="dropdown-menu" style="font-size:13px;">
						<li><a href="cadastroA.php"> Cadastrar animais</a></li>
						<li><a href="perfil.php">Perfil</a></li>
						<li><a href="config.php">Configuração</a></li>
						<li><a href="ajuda.php">Ajuda</a></li>
						<li class="divider"></li>
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
					</ul>
				';

			} ?>
		</ul>
	</div>
	</div>

</nav>
</nav>
<!--fim menu-->
<div class="fontee">
	<div class="img">
	<div class="conteiner">
		<div class="row">
			<div class="col-xs-12">
				<h1 class="text-center" style="font-family:Grand Hotel;"> Save Pets </h1>
				<h2 class="text-center" style="font-family:Grand Hotel;">Aqueles que mais ensinam sobre a humanidade, são os animais.  </h2>

			</div>
		</div>
	</div>
	</div>
</section>
<section class="content-site">
	<div class="container">
		<div class="row">
				<div class="col-xs-12">

					<h3 class="text-center"> Ajude a encontra animais. </h3>
				</div>

		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="thumbnail">
					<img src="imagens/08.jpeg">
					<div class="caption text-center">
						<h3> Procure </h3>
					<p> "Um homem sem um cachorro sempre estará em má companhia".  Procure seu animal que está perdido!  </p>

						<br>
						<br>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="thumbnail">
					<img src="imagens/03.jpg">
					<div class="caption text-center">
						<h3> Encontre </h3>
						<p> Gatos e Cachorros não são para a vida toda, mas eles fazem nossas vidas eternas! Ajude no encontro de animais perdidos. </p>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="thumbnail">
					<img src="imagens/01.jpg">
					<div class="caption text-center">
						<h3> Adote </h3>
						<p> Quem cuida faz por amor, quem adota também.</p>
						<p>Adote um animal!</p>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>












<section class="img-site">
<div class="row">
<div class="conteiner">
		<div class="col-xs-12">
<div class="fontee">

				<p class="lead text-center">Perdeu ou encontrou um animal? Anuncie aqui.<br>
					Quer um amigo que nunca irá lhe julgar ou lhe abandonar? Faça a diferença adote um animal! </div>

</section>

<section class="rodape">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h5><a href="somos.php"> Quem somos? </a></h5>
					<p> Entre em contato: administracao@savepets.com.br </p>
			</div>
		</div>
	</div>
</section>


</body>
</html>
