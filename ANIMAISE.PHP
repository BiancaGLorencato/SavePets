<?php
include ("conexao.php");

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
		<link rel="stylesheet" href="menu.css">
		<link rel="stylesheet" href="animais.css">
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
			<title>Save Pets</title>
			<link rel="stylesheet" type="text/css" href="css/animais.css" />
		<script src="js/modernizr.custom.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	

</head>

 
<body>
<body style ="background-color:#E8E9EA">

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
<div class="container">	
<div class="main">
<?php
	$sql=" SELECT * FROM animais 
	INNER JOIN encontrado_na_rua
	ON animais.cod_animais =encontrado_na_rua.cod_animais
	INNER JOIN cadastro_pessoas
	ON animais.codlogin=cadastro_pessoas.codlogin;";
	
	$resultado=mysqli_query($conexao,$sql);
		while ($linha=mysqli_fetch_array($resultado)){
			$animais[]= $linha;
		}

$sql = "SELECT * FROM encontrado_na_rua";
			$resultado = mysqli_query($conexao, $sql);
		if(mysqli_num_rows($resultado) > 0){ 
?>
<h4>Clique na imagem para ver informações sobre os animais</h4>


<?php
		foreach ($animais as $dado){

?>
          
				

		 					
	
						
<section>
				    <div class="col-md-3">

				<ul id="rb-grid" class="rb-grid clearfix">

					<li>

                <img src="<?php echo "./img/".$dado ["foto"]?>" class="img-responsive">


					<div class="rb-overlay">
					
							<span class="rb-close">close</span>
							<br>
					<br>
					<br>
					<br>
				<div class="fonte"><h3> <p>Descrição: <?php echo $dado ["descricao"]?></p>
               <p>Raça: <?php echo $dado ["raca"]?></p>	
			   <p>Espécie: <?php echo $dado ["tipo"]?></p>
				<p>Bairro: <?php echo $dado ["bairro_animais"]?></p>
				<br>
				<p>Entre em contato:</p>
                <p>Nome: <?php echo $dado ["nome"]?></p>
                <p>Email: <?php echo $dado ["email"]?></p></div></a></h3></div>
																</div>
			
					</li>

<?php
	}
		}else{
			echo '<h2 style="text-align:center; color:red; margin-top:50px;"> Desculpe, ainda não temos animais encontrados na rua <h2>';
		}
?>


</ul>

		</section>		
		


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/jquery.fittext.js"></script>
		<script src="js/boxgrid.js"></script>
		<script>
			$(function() {

				Boxgrid.init();
				

			});
		</script>
			</div>

	</div>

</body>
</html>
