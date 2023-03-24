<?php
include ("conexao.php");
?>

<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="config.css">
<link rel='shortcut icon' href="logo.png" />
     <script src="js/javascript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> 
	<title> Configuração </title>




</head>
<body>


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
<?php 
$codlogin=$_SESSION['codlogin'];
$sql = "SELECT * FROM cadastro_pessoas WHERE login='$nome'";
$query = mysqli_query($conexao, $sql);
while($sql = mysqli_fetch_array($query)){
$nome = $sql["nome"];
$sobrenome=  $sql["sobrenome"];
$cep = $sql["cep"];
$rua = $sql["rua"];
$numero = $sql["numero"];
$bairro = $sql["bairro"];
$cidade = $sql["cidade"];
}
?>
<?php
    

	if(isset($_POST["alterar"])) {
        $nome= $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $senha= $_POST["senha"];
		$senha_codificada = sha1($senha);
        $confirmesenha= $_POST["confirmesenha"];
		$codlogin=$_SESSION['codlogin'];
		$senhaantiga=$_POST['senhaantiga'];
		$senhaantiga_cod=sha1($senhaantiga);
		$senhavelha=$_SESSION['senha'];
		$cep= $_POST["cep"];
		$rua = addslashes($_POST['rua']);
		$numero= $_POST["numero"];
		$bairro= $_POST["bairro"];
		$cidade= $_POST["cidade"];
		

		
		if(!empty($nome or $sobrenome)) {
			$sql = "call atualizar_Nome_Sobrenome('".$nome."','".$sobrenome."','".$codlogin."')";
			mysqli_query($conexao,$sql);
			echo "<div class='alert alert-success fade in'> Dados alterados com sucesso
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  </div>";
		}
		if(!empty($senha)) {
			if ($senhaantiga_cod != $senhavelha){
					echo "<div class='alert alert-warning fade in'> Sua senha antiga esta errada
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  </div>";
			}else{
				if( !isset( $senha[5] ) ) {
					echo "<div class='alert alert-warning fade in'> Sua senha deve possuir no mínimo 5 caracteres!
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  </div>";
				} else{
						if ($confirmesenha != $senha) {
							echo "<div class='alert alert-warning fade in'> As senhas não coincidem!
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  </div>";
						}else{
							$sql = "CALL atualizar_Senha ('".$senha_codificada."','".$codlogin."')";
							mysqli_query($conexao,$sql);
							echo "<div class='alert alert-success fade in'> Dados alterados com sucesso
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  </div>";
						}
				}
					
			}
		}else{
		if(!empty($cep or $rua or $cidade or $numero or $bairro)) {
			$sql = "CALL atualizar_Endereco ('".$cep."','".$rua."','".$cidade."','".$numero."','".$bairro."','".$codlogin."')";
			mysqli_query($conexao,$sql);
			echo "<div class='alert alert-success fade in'> Dados alterados com sucesso
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  </div>";
		}
		}


				}
		?>


<h3 class="text-center"><strong>Configuração</strong></h3>


		<form method="post" action="">
			


				<label style="margin-left:20px; font-size:18px; color: black; " > Alterar Dados </label><br><br>
				
					
<div class="container">
<div class="row">
<div class="col-md-3">
<label>Nome</label><br>
					<input class="txt" type="text" name="nome"      id="nome"      placeholder="Alterar Nome" value="<?php echo $nome; ?>" >
					
					 </div>
    <div class="col-md-3">
	<label>Sobrenome</label><br>
					<input class="txt" type="text" name="sobrenome" id="sobrenome" placeholder="Alterar Sobrenome" value="<?php echo $sobrenome; ?>" >
					</div>
					</div>
					
					<br>

			</div>
			
			
			
<br><br>
			<div class="container">
				
				<label> Alterar Senha </label><br>
				<div class="row">
				<div class="col-md-3">
					<input class="txt" type="password" name="senhaantiga" placeholder="Senha antiga">
					</div>
					<div class="col-md-3">
					<input class="txt" type="password" name="senha" placeholder="Senha Atual">
					</div>
					<div class="col-md-3">
					<input class="txt" type="password" name="confirmesenha" placeholder="Confirme sua senha">
			</div></div></div>
<br><br>


			<div class="container">


				<label> Alterar Endereço </label><br>
					<div class="row">
<div class="col-md-3">
					<input class="txt" type="text" name="cep" 	 id="cep"    placeholder="Cep"    value="<?php echo $cep; ?>" required pattern="[0-9]+$" title="Numeros"><br><br>
					</div><div class="col-md-3">
					<input class="txt" type="text" name="rua" 	 id="rua"    placeholder="Rua"    value="<?php echo $rua; ?>">
					</div><div class="col-md-3">
					<input class="txt" type="text" name="numero" id="numero" placeholder="Número" value="<?php echo $numero; ?>"><br><br>
					</div></div></div>
					<div class="container">
					<div class="row">
					<div class="col-md-3">
					
					<input class="txt" type="text" name="bairro" id="bairro" placeholder="Bairro" value="<?php echo $bairro; ?>">
						</div><div class="col-md-3">
						
				<input class="txt" type="text" name="cidade" id="cidade" placeholder="Cidade" value="<?php echo
				$cidade; ?>">
					</div></div></div>
			</div>
<br><br>
<div class="container">
<button class="btn" type="submit" name="alterar"> Alterar</button>
			</form>
	</div>


<script type="text/javascript">
	$("#cep").focusout(function(){
		$.ajax({
		  //O campo URL diz o caminho de onde virá os dados
		  url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
		  dataType: 'json',
			success: function(resposta){
				$("#rua").val(resposta.logradouro);
				$("#bairro").val(resposta.bairro);
				$("#cidade").val(resposta.localidade);
				$("#numero").focus();
			}
		});
	});
	
</script>




</body>
	
</html>

