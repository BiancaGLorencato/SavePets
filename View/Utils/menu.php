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
			if(!isset($_SESSION['login'])){
				echo  '
					<li><a href="cadastrar.php"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a></li>
					<li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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