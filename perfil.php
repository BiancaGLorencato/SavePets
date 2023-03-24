<?php
include("conexao.php");

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['senha'])){
	header('location:login.php'); //se a pessoa não estiver logada ela é redirecionada para a pagina de login.
exit;
}
else{
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/perfil.css">
<link rel="stylesheet" href="_borders.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">

		 <script src="js/modernizr.custom.97074.js"></script>
<title>SavePets</title>

</head>
<body style ="background-color:#ECE9E9">
<section class="header">
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

	            <div class="mobile"><div class="desktop-hide"><div class="text-center">
				<h4>Clique na imagem para excluir</h4></div></div></div><!-- Aparece apenas no mobile-->

		<!--Consulta encontrados-->
<div class="animais">
		    <div class="container">

<div class="text-center">
             <h3 class="page-title">Animais que você encontrou na rua</h3>
            </div>
<section>
				<ul id="da-thumbs" class="da-thumbs">

<?php
$sqlA=" SELECT * FROM animais
inner join encontrado_na_rua
on animais.cod_animais=encontrado_na_rua.cod_animais
inner join cadastro_pessoas
on animais.codlogin= cadastro_pessoas.codlogin
where login='$nome';";
$resultado=mysqli_query($conexao,$sqlA);
	while ($linha=mysqli_fetch_array($resultado)){
		$animais[]=$linha;
	}

	if(mysqli_num_rows($resultado) > 0){
		foreach ($animais as $dadoE){
			$cod_animais= $dadoE["cod_animais"];
?>
					<li>
					<img src="<?php echo "./img/".$dadoE ["foto"]?>" alt="" class="img-responsive">
	<div class="encontrado"><span><a id="a" href="delete.php?id=<?=$dadoE['cod_animais']; ?>" onClick="return confirm('Deseja realmente deletar este animal?')">
				<button class="btn" type="submit"  name="excluir" value="excluir" > Achei meu dono</button></a></span></div>
					</li>
<?php
	}
	}else{
		echo '<h4 style="text-align:center; color:red; margin-top:50px;"> Você não cadastrou nenhum animal encontrado na rua <h4>';
	}//fim else

?>

</ul>
</section>
<br><br><br>
</div>
</div>
</span>

<!-- fim content-->



<span class="border"></span>

<!--Fim consulta encontrados-->

<!--Consulta Perdidos-->
<div class="animais">

		    <div class="container">
			
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb40 text-center">
                <h3 class="page-title">Animais que você esta procurando</h3>
            </div>
        <section>
				<ul id="da-thumbs" class="da-thumbs">

<?php
$sqlp=" SELECT * FROM animais
inner join procurados
on animais.cod_animais=procurados.cod_animais
inner join cadastro_pessoas
on animais.codlogin= cadastro_pessoas.codlogin
where login='$nome';";
$resultadop=mysqli_query($conexao,$sqlp);
	while ($linhap=mysqli_fetch_array($resultadop)){
		$animaisp[]=$linhap;
	}


	if(mysqli_num_rows($resultadop) > 0){
		foreach($animaisp as $dadop){

			$cod_animais= $dadop["cod_animais"];

?>

<li>
					<img src="<?php echo "./img/".$dadop ["foto"]?>" alt="" class="img-responsive" >

	<div><span>

	<a id="a" href="delete.php?id=<?=$dadop['cod_animais']; ?>" onClick="return confirm('Deseja realmente deletar este animal?')">
				<button class="btn" type="submit"  name="excluir" value="excluir" > Meu dono me achou</button></a></span></div>
					</li>



<?php

	}


	}else{
		echo '<br><h4 style="text-align:center; color:red; margin-top:50px;"> Você não cadastrou nenhum animal perdido </h4>';
	}//fim else

?>

</ul>
</section>
<br><br><br>
</div>
</div>
 </div>
 

<!--Fim consulta procurados-->


<!--Consulta Adoção-->
<div class="animais">
	    <div class="container">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb40 text-center">
                <h3 class="page-title">Animais que você colocou para adoção</h3>
            </div>
        <section>
				<ul id="da-thumbs" class="da-thumbs">
<?php
$sqlp=" SELECT * FROM animais
inner join adocao
on animais.cod_animais=adocao.cod_animais
inner join cadastro_pessoas
on animais.codlogin= cadastro_pessoas.codlogin
where login='$nome';";
$resultad=mysqli_query($conexao,$sqlp);
	while ($linh=mysqli_fetch_array($resultad)){
		$animai[]=$linh;
	}

	if(mysqli_num_rows($resultad) > 0){
		foreach($animai as $dado){

			$cod_animais= $dado["cod_animais"];

?>

<li>

					<img src="<?php echo "./img/".$dado ["foto"]?>" alt="" class="img-responsive" >

	<div><span><a id="a" href="delete.php?id=<?=$dado['cod_animais']; ?>" onClick="return confirm('Deseja realmente deletar este animal?')">
				<button class="btn" type="submit"  name="excluir" value="excluir" > Fui adotado </button></a></span></div>
					</li>



<?php

	}


	}else{
		echo '<h4 style="text-align:center; color:red; margin-top:50px;"> Você não cadastrou nenhum animal para adoção </h4>';
	}//fim else

?>

</ul>
</section>
<br><br><br>

</div>
</div>


		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.hoverdir.js"></script>
		<script type="text/javascript">
			$(function() {

				$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

			});
		</script>
</body>
</html>
