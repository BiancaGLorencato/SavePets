<?php
include ("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
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
<link rel="stylesheet" href="termos.css">
<link rel="stylesheet" href="/css/cadastro/cadastrar.css">
<title>Cadastro</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script src="js/javascript.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> 
<script type="text/javascript" src="/js/cadastro/cadastro.js"></script>
</head>

<body>

	<section class="header">
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


						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

			</ul>
		</div>
		</div>

	</nav>
	</nav>
	<!--fim menu-->
<div class=" row backgroundimg">
	<section class="estrutura">
	<div class="container">
	<?php
	 if(isset ($_POST ['enviar'])){
		$login=(!empty($_POST['login'])) ? $_POST ['login']:'';
		$nome=(!empty($_POST['nome'])) ? $_POST ['nome']:'';	
		$sobrenome=(!empty($_POST['sobrenome'])) ? $_POST ['sobrenome']:'';
		$nascimento=(!empty($_POST['nascimento'])) ? $_POST ['nascimento']:'';
		$senha=$_POST['senha'];
		$senha_codificada = sha1($senha);
		$confirmesenha  = $_POST['confirmesenha'];
		$rua = addslashes($_POST['rua']);
		$rua = (!empty($rua)) ? $rua:'';
		$bairro =(!empty($_POST['bairro'])) ? $_POST ['bairro']:'';
		$numero =(!empty($_POST['numero'])) ? $_POST ['numero']:'';
		$cep= (!empty($_POST['cep'])) ? $_POST ['cep']:'';
		$complemento =(!empty($_POST['complemento'])) ? $_POST ['complemento']:'';
		$cidade= (!empty($_POST['cidade'])) ? $_POST ['cidade']:'';
		$email= (!empty($_POST['email'])) ? $_POST ['email']:'';
		$rs = "SELECT * FROM cadastro_pessoas  WHERE login = ('$login')"; 
		$verifica=mysqli_query($conexao,$rs);
		 if(mysqli_num_rows($verifica)){
			 echo "<div class='alert alert-warning fade in'> Usuário já cadastrado!
			 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  </div>";
		}else {
			$rs = "SELECT * FROM cadastro_pessoas  WHERE email =('$email')";
				$verifica=mysqli_query($conexao,$rs);
					if(mysqli_num_rows($verifica)){
					 echo "<div class='alert alert-warning fade in'> Email já cadastrado!
					 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  </div>";
					}else{
						if( !isset( $senha[5] ) ) {
							echo "<div class='alert alert-warning fade in'> Sua senha deve possuir no mínimo 6 caracteres!
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  </div>";
						}else {
							$inserir="CALL inserirPessoas('".$login."', '".$nome."', '".$sobrenome."', '".$email."', '".$nascimento."', '".$senha_codificada."', '".$cidade."','".$rua."', '".$cep."', '".$numero."', '".$bairro."','".$complemento."')";
							mysqli_query($conexao,$inserir);
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
		}
					}
				}
					}
		}
?>
				<div class="row">
					<div class="col-md-12 primeira">
							<h3><strong>Cadastro</strong></h3>
					</div>
				</div>
				<form id="form1" method="post" action="">
					<div class="row">
						<div class="col-md-6 primeira">
							<p> Nome</p>
							<input class="form-control" type="text" name="nome" id="nome" value="<?php 	if(!empty($_POST['nome'])){ echo htmlentities($nome);}?>" required> <br>
						</div>
						<div class="col-md-6 primeira">
							<p>Sobrenome</p>
							<input class="form-control" type="text" name="sobrenome" id="sobrenome" value="<?php if(!empty($_POST['sobrenome'])){ echo htmlentities($sobrenome); }?>" required> <br>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 primeira">
							<p>Nascimento</p>
					    <input class="form-control" type="text" data-mask="00/00/0000" placeholder="dd/mm/yyyy" maxlength="10" autocomplete="off" id="nascimento" name="nascimento" value="<?php if(!empty($_POST['nascimento'])){ echo htmlentities($nascimento);}?>" required>
						</div>
						<div class="col-md-4 primeira">
						  <p> Usuario </p>
							<input class="form-control" type="text" id="login" name="login" value="<?php if(!empty($_POST['login'])){ echo htmlentities($login);}?>"required><br>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 primeira">
							<p>Email</p>
							<input class="form-control" type="email" id="email" name="email" value="<?php if(!empty($_POST['email'])){ echo htmlentities($email); }?>" required><br>
						</div>
						<div class="col-md-4 primeira">
							<p>Senha</p>
		          <input class="form-control" type="password" name="senha" id="senha" required><br>
						</div>
						<div class="col-md-4 primeira">
							<p>Confira sua senha</p>
		          <input class="form-control" type="password" name="confirmesenha" id="confirmesenha" required><br>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 primeira">
							<p>Cep</p>
							<h5>*Apenas números.</h5>
							<input class="form-control" id="cep" name="cep" type="text" required pattern="[0-9]+$" title="Numeros" value="<?php if(!empty($_POST['cep'])){ echo htmlentities($cep);}?>"><br>
						</div>
						<div class="col-md-6 primeira">
							<p>Rua</p>
							<br>
							<input class="form-control" id="rua" name="rua" type="text" required value="<?php if(!empty($_POST['rua'])){ echo htmlentities($rua);}?>" ><br>
						</div>
						<div class="col-md-2 primeira">
							<br>
						  <p>Numero</p>
							<input class="form-control" name="numero" type="text"  placeholder="Número" value="<?php if(!empty($_POST['numero'])){  echo htmlentities($numero);}?>" ><br>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 primeira">
						<p>Complemento</p>
							<input class="form-control" id="complemento" name="complemento" type="text" value="<?php if(!empty($_POST['complemento'])){  echo htmlentities($complemento);}?>"><br>
						</div>
						<div class="col-md-4 primeira">
							<p>Bairro</p>
							<input class="form-control" id="bairro" name="bairro" type="text" value="<?php if(!empty($_POST['bairro'])){  echo htmlentities($bairro); }?>" required><br>
						</div>
						<div class="col-md-4 primeira">
							<p>Cidade</p>
						<input class="form-control" id="cidade" name="cidade" type="text" value="<?php if(!empty($_POST['cidade'])){  echo htmlentities($cidade); }?>" required><br>
						</div>
					</div>
					<input class="form-check-input" type="checkbox" required>Li e aceito os <a class="termos" onClick="Termos('termo')">termos de uso</button><br>
		        <div id="termo">
		          <textarea class="txtg" cols="60" rows="8">
		            TERMOS DE USO DO SITE:

		              1. Este site utilizará de suas informações que foram introduzidas no cadastro, para melhor gerenciamento do aplicativo e para mostrar as funções que ele possui.
		            1.1. Os dados serão armazenados em segurança, não possuindo livre acesso e nem exposição de informações dos usuários. Apenas os administradores possuem acesso a essas informações.
		              2. O site não pode ser copiado sem a permissão dos administradores.
		            2.1. Caso ocorra o fator citado a cima, sem a permissão dos administradores, tal situação será tratada como plágio e violação aos direitos autorais.
		            2.2. De acordo com o Código Penal, que diz: Art.184 Violar direitos de autor e os que lhe são conexos terão: pena-detenção, de 3(três) meses a 1(um) ano, ou multa. Tal lei será colocada à prova, sendo imutável essa decisão.
		              3. O Website possui a intensão de auxiliar o encontro de animais que foram perdidos, de uma forma rápida e a sua disposição a qualquer hora.
		            3.1. O site não dispõe de conteúdos relacionados a conotações sexuais, não faz uso de palavras obscenas ou blasfêmias ao usuário.
		            3.2.O uso indevido do site, como por exemplo fazer brincadeiras, pode gerar desavenças entre os usuários. Por tal motivo, é estritamente proibido o uso do site se for para usa-lo de maneira imprópria. O uso inadequado deste pode levar o usuário a ter sua conta bloqueada.
		              4. Qualquer semelhança com outro site é mera coincidência, SAVE PETS possuem características próprias e foi programado desde o início pelos alunos BIANCA GALVÃO, LORENA ANDRADE, VANESSA LEMOS e VICTOR HUGO.
		          </textarea>
						</div>
						<br><br>
						<a class="login" href="login.php"> Ja é cadastrado? Faça login.</a>
						<br><br>
						<button class="btn btn-primary btn-lg" type="reset" >Limpar</button>
					 	<button class="btn btn-primary btn-lg" type="submit" name="enviar" onclick="validarSenha()">Cadastrar</button>


<!-- acaba javascript-->

				</form>
			</div>
			<br><br><br><br><br>

		</selection>
</div>





</body>

</html>