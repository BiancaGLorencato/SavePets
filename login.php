<?php
include("conexao.php");
?>
<!DOCTYPE html >
<html lang="pt-br">
<head>

 <meta charset="utf-8">
 <link rel="stylesheet" href="login.css">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
 <script src="javascript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> 
<title>Login</title>


</head>
<body>

<section class="corpo">
<!--menu mobile-->
<nav class="navbar navbar-default ">
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
			<li><a href="cadastrar.php"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a></li>
		</ul>
	</div>
	</div>
	</nav>
</nav>
</section>
<!--fim menu-->

<!--  formulario -->
<div class=" row backgroundimg">
<div class="corpos">
<div class="container">
<?php
if(isset($_POST['entrar'])){//inicio if isset
	$login = $_POST['login'];
	
  $senha = $_POST['senha'];
	$senha_codificada = sha1($senha);
$sql = "CALL login ('".$login."','".$senha_codificada."')";

	$resultado = mysqli_query($conexao, $sql);



		if(mysqli_num_rows($resultado) > 0){
			while($resposta = mysqli_fetch_assoc($resultado)){
				$login = $resposta['login'];
				$senha = $resposta['senha'];
				$codlogin=$resposta['codlogin'];
				session_start();
				$_SESSION['login']= $login;
				$_SESSION['senha']= $senha;
				$_SESSION['codlogin']= $codlogin;
				header('Location:index.php');


			}
		}else{
			
				echo "<div class='alert alert-warning fade in'> Usúario ou senha incorretas
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  </div>";


}
}
?>
<div class="containe">

	<form  class="form" method="post" action="">
		<h2  style="color: black;">Login </h2> <br>

			<input type="text" class="form-control" name="login" placeholder="Usuario ou Email" required> <br>
			<input  type="password" class="form-control " name="senha" placeholder="Senha" required><br>
			<button class="btn btn-primary btn-lg " type="reset" >Limpar</button>
			<button class="btn btn-primary btn-lg" type="submit" name="entrar" > Entrar</button>

<br><br>
		<a class="cadastro" href="senha.php"> Esqueci  minha senha</a><br>
		<a class="cadastro" href="cadastrar.php"> Não é cadastrado? Cadastre-se</a>

	</form>

</div>
</div>
<!--  php relacionado ao formulario login -->

<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br>

</div>
</div>




</body>
</html>
