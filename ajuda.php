<!DOCTYPE html>
<?php
include("conexao.php");
?>
<?php
	session_start();
		if(!isset($_SESSION['login']) || !isset($_SESSION['senha'])){
			header('location:login.php'); //se a pessoa não estiver logada ela é redirecionada para a pagina de login.
			exit;
		}else{

		}
?>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ajuda</title>
		<meta name="description" content="Responsive CSS Timeline with 3D Effect" />
		<meta name="keywords" content="timeline, 3d, css, css3, css-only, transitions, responsive, fluid" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">

		<script src="js/modernizr.custom.63321.js"></script>
		<!--[if lte IE 7]><style>.support-note .note-ie{display:block;}</style><![endif]-->

	</head>
<body style ="background-color:#E8E9EA">
    		<!--menu mobile-->
    	<nav class="navbar navbar-default">
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
    				<li><a href="#"></a></li>
    					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><?php $nome=$_SESSION['login']; echo "Olá ".$nome; ?> <span class="caret"></span></a>
    						<ul class="dropdown-menu" style="font-size:13px;">
    							<li><a href="perfil.php">Perfil</a></li>
    							<li><a href="config.php">Configuração</a></li>
    							<li><a href="ajuda.php">Ajuda</a></li>
    							<li class="divider"></li>
    							<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    						</ul>
    					</ul>
    		</div>
    		</div>

    	</nav>
    	</nav>

    	<!--fim menu-->

      <div class="container">
			<header class="clearfix">


				<h2>Duvidas frequentes <h4>Aperte no mais de sua duvida para mais informação</h4></h2>


			</header>

			<section class="main">

				<ul class="timeline">

					<li class="event">
						<input type="radio" name="tl-group" checked/>
						<label></label>
						<div class="thumb user-2"><span>19 Nov</span></div>
						<div class="content-perspective">
							<div class="content">
								<div class="content-inner">
									<h3>Perdi meu Pet. O que devo fazer?</h3>
									<p>Verfique se o animal se encontra na área "Animais encontrado na rua". Se ele estiver entre em contato com o anunciante
									Caso ele não esteja, se cadastre ou faça login no site, após cadastre se animal na area "Cadastrar animais", escolha um tipo, uma raça,
										selecione como perdido, insira a última dada vista, o bairro e uma foto. </p>
								</div>
							</div>
						</div>
					</li>

					<li class="event">
						<input type="radio" name="tl-group"/>
						<label></label>
						<div class="thumb user-1"><span>18 Nov</span></div>
						<div class="content-perspective">
							<div class="content">
								<div class="content-inner">
									<h3>Quero adotar um animal. Como eu realizo esse procedimento?</h3>
									<p>Na áre "Adoção", você pode escolher um animal e entra em contato com a pessoa que cadastrou o animal.</p>
								</div>
							</div>
						</div>
					</li>

					<li class="event">
						<input type="radio" name="tl-group"/>
						<label></label>
						<div class="thumb user-3"><span>17 Nov</span></div>
						<div class="content-perspective">
							<div class="content">
								<div class="content-inner">
									<h3>Encontrei um animal. Como devo agir? </h3>
									<p>Se você encontrar um animal abandonado você pode cadastra-lo como encontrei aqui no site, sendo seu financiador/cuidador até o dono entrar em contato. VERIFIQUE SE O ANIMAL ESTÁ REALMENTE PERDIDO</p>
								</div>
							</div>
						</div>
					</li>

					<li class="event">
						<input type="radio" name="tl-group"/>
						<label></label>
						<div class="thumb user-1"><span>16 Nov</span></div>
						<div class="content-perspective">
							<div class="content">
								<div class="content-inner">
									<h3>Aqui vão algumas orientações.</h3>
									<p>	-Ofereça ou encontre um lar temporário.</p>
									<p>  -Cuide bem do animal</p>
									<p>  -Divulgue no nosso site</p>
								</div>
							</div>
						</div>
					</li>

					<li class="event">
						<input type="radio" name="tl-group"/>
						<label></label>
						<div class="thumb user-2"><span>15 Nov</span></div>
						<div class="content-perspective">
							<div class="content">
								<div class="content-inner">
									<h3>Avisos Importantes:</h3>
									<p> -Sempre que combinar de encontrar outra pessoa, seja para devolver o animal que foi encontrado, adotar ou até mesmo recuperar seu animal que
estava perdido, estabeleça um ponto de encontro em locais públicos para sua melhor segurança, evitando assim possíveis problemas.</p>
									<p> -Tome cuidado sempre ao resgatar um animal, dependendo de seu estado ele pode possuir algum tipo de doença ou até mesmo ser agressivo.</p>
									<p> -Não maltrate nunca os animais, eles também possuem sentimentos.</p>
									<p> -Sempre avise amigos e/ou familiares antes de realizar o encontro.</p>
									<p> -Coloque fotos do seu animal, onde de pra ver bem as características dele. Evite fotos borradas ou até mesmo fotos em que ele esteja com alguma pessoa.</p>
									<p> -Se o usuário tiver algum animal, é muito importante e interessante ele pensar em fazer uma coleira com nome do animal e com o seu telefone para contato.</p>
									<p> -Vacine sempre seus animais.</p>
								</div>
							</div>
						</div>
					</li>



				</ul>
			</section>

		</div><!-- /container -->

	</body>
</html>
