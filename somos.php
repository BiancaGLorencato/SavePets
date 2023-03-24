<?php
	session_start();
	
	?>
<!doctype html>
<html lang="pt-br">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<link href="css/bootstrap-datepicker.css" rel="stylesheet"/><!-- faz a data funcionar -->
		<script src="js/bootstrap-datepicker.min.js"></script> <!-- faz a data funcionar -->
		<script src="js/bootstrap-datepicker.pt-BR.min.js"></script><!-- faz a data funcionar -->

<meta charset="UTF-8" />
	    <link rel="stylesheet" href="estilo.css">
		
		
    <title>Quem somos</title>
	
     <script src="javascript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    
		</head>

<body>

	<!--Inicio menu -->
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
			<?php
			
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
						<li><a href="perfil.php"> Perfil</a></li>
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


<font color="white">
		<div style="text-align: center;">

<h2>Quem somos?</h2>

	
		
		
<div id="texto">
				<p>SAVE PETS é um site criado para auxiliar no encontro e na doação
				de animais perdidos, sem fins lucrativos, para que de forma fácil e
				prática salvemos os animais desabrigados, reencontrando	e/ou achando
				um novo dono para eles.</p>
				<p>Pensamos em desenvolver esse site após percebemos que muitos animais
				de estimação vivem nas ruas a procura de um lar, alguns porque se perderam,
				foram abandonados ou até mesmo já nasceram nas ruas.</p>
				<p>Esse número vem aumentando, o que gera preocupação diversas pessoas,
				pois eles vivem em condições precárias e com isso acabam ficando doentes,
				possibilitando a transmição de doenças para apopulação.
				<p>O projeto teve inicio desde o dia 21 de fevereiro de 2018,sendo 
				desenvolvido pelos alunos Bianca Galvão, Lorena Andrade, Vanessa Lemos
				e Victor Hugo, do 3ºAno do Ensino Médio Integrado com Técnico de Informática,
				no Colégio Seta e pretende ajudar o maior número animais possíveis,
				para que um dia alcancemos a meta de não existir nenhum animal vivendo nas ruas,
				semelhante a o que ocorre na Holanda.</p>
				<p>SAVE PETS está no inicio de seu desenvolvimento e por tal motivo ainda não
				possui recursos para obter e manter um abrigo, entretanto daremos auxilio aos
				usuários a encontrarem seus animais e na adoção.</p>
			</div>

</body>
</html>