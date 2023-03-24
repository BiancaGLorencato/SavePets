
<?php
include("conexao.php");
error_reporting(0);
ini_set("display_erro",0);
?>

<?php
	session_start();
		if(!isset($_SESSION['login']) || !isset($_SESSION['senha'])){
			header('location:login.php');
			//exit;
		}else{

		}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Cadastro Animais</title>
<link rel="stylesheet" href="cadastroA.css">

<script type="text/javascript">
window.onload = function()
{
	document.getElementById('ca').style.display = 'none';
	document.getElementById('ga').style.display = 'none';
	document.getElementById('visto').style.display = 'none';
	document.getElementById('txtVisto').style.display = 'none';
	document.getElementById('encontrado').style.display = 'none';
}
function rac() {
	if (document.getElementById('cachorro').checked) {
			document.getElementById('ca').style.display = 'block';
			document.getElementById('ga').style.display = 'none';
	}
	else if(document.getElementById('gato').checked) {
			 document.getElementById('ca').style.display = 'none';
			document.getElementById('ga').style.display = 'block';
	}
}

function perdido() {


if (document.getElementById('perdi').checked) {
			document.getElementById('visto').style.display = 'block';
			document.getElementById('txtVisto').style.display = 'block';
			 document.getElementById('encontrado').style.display = 'none'; //Colocado aqui para que quando a pessoa clicar em achei e depois em perdi não apareça a mensagem de achei



	}else{
			 document.getElementById('visto').style.display = 'none';
			document.getElementById('txtVisto').style.display = 'none';
			 document.getElementById('encontrado').style.display = 'none'; //Colocado aqui para que quando a pessoa clicar em achei e depois em encontrado não apareça a mensagem de achei

	}
}
function verficar(){
	gato= document.getElementById('gato');
	cachorro = document.getElementById('cachorro');
	adocao = document.getElementById('adocao');
	achei = document.getElementById('achei');
	perdi = document.getElementById('perdi');
	visto = document.getElementById('visto');
	if( gato.checked==false && cachorro.checked== false){
		alert("Escolha uma especie e uma raça");
	}else{
		if(adocao.checked==false && achei.checked== false && perdi.checked== false){
			alert("Você perdeu, encontrou ou quer doar o animal? Por favor informar");
		}else{
			if(perdi.checked==true && visto.value==""){
				alert("Por favor informar a ultima vez que você viu o animal");
			}
		}
	}
}
function encontrado() {


if (document.getElementById('achei').checked) {
			document.getElementById('encontrado').style.display = 'block';
			document.getElementById('visto').style.display = 'none';
			document.getElementById('txtVisto').style.display = 'none';


	}else{
			 document.getElementById('encontrado').style.display = 'none';

	}
}
</script>


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

</head>

<body>

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

<div class=" row backgroundimg">
	<section class="corpos">
		<div class="container">
				<div class="contain">
				<h2  style="color: black;">Cadastro Animais </h2>
				<div class="cadastro">
					<div class="form-container">
		<form action="" method="post" id="animais" enctype="multipart/form-data">
<br>
		<label style="color:black;">Especie:</label><br>
			<input type="radio" class="form-check-input"  name="tipo[]" id="cachorro" value="cachorro" onClick="rac()" >Cachorro
			<input type="radio"  class="form-check-input" name="tipo[]" id="gato" value="gato"  onClick="rac()">Gato
<br>
		<select id="ca" name="raca" style="margin-top:15px; color:black;">
			<option disabled selected>Selecione uma raça de cachorro</option>
			<option>Afghan Hound</option>
			<option>Airedale Terrier</option>
			<option>Akita </option>
			<option>American Staffordshire Terrier </option>
			<option>Australian Cattle(Boiadeiro Australiano)</option>
			<option>Basenji</option>
			<option>Basset Hound</option>
			<option>Beagle</option>
			<option>Bernese Mountain</option>
			<option>Bichon Frisé</option>
			<option>Bloodhound</option>
			<option>Border Collie</option>
			<option>Borzoi</option>
			<option>Boston Terrier</option>
			<option>Boxer</option>
			<option>Buldogue Francês</option>
			<option>Buldogue Inglês</option>
			<option>Bull Terrier</option>
			<option>Cane Corso</option>
			<option>Cão de Crista Chinês</option>
			<option>Cavalier King Charles Spaniel</option>
			<option>Chihuahua</option>
			<option>Chow Chow</option>
			<option>Cocker spaniel Americano</option>
			<option>Cocker Spaniel Inglês</option>
			<option>Collie</option>
			<option>Dachshund</option>
			<option>Dálmata</option>
			<option>Doberman</option>
			<option>Dogo Argentino</option>
			<option>Dogue Alemão</option>
			<option>Dogue de Bordeaux</option>
			<option>Fila Brasileiro</option>
			<option>Fox Paulistinha</option>
			<option>Golden Retriever</option>
			<option>Greyhound</option>
			<option>Griffon de Bruxelas</option>
			<option>Jack Russell Terrier</option>
			<option>Husky Siberiano</option>
			<option>Kuvasz</option>
			<option>Labrador</option>
			<option>Leão da Rodésia</option>
			<option>Lhasa Apso</option>
			<option>Lulu da Pomerânia</option>
			<option>Malamute do Alasca</option>
			<option>Maltês</option>
			<option>Mastiff</option>
			<option>Old English Sheepdog</option>
			<option>Papillon</option>
			<option>Pastor Alemão </option>
			<option>Pastor Australiano</option>
			<option>Pastor Belga</option>
			<option>Pastor Branco Suíço</option>
			<option>Pastor de Shetland</option>
			<option>Pastor Maremano Abruzês</option>
			<option>Pequinês</option>
			<option>Pinscher</option>
			<option>Pit Bull</option>
			<option>Pointer Inglês</option>
			<option>Poodle</option>
			<option>Pug</option>
			<option>Rottweiler</option>
			<option>Samoieda</option>
			<option>São Bernardo</option>
			<option>Schnauzer</option>
			<option>Setter Irlandês</option>
			<option>Shar Pei</option>
			<option>Shiba Inu</option>
			<option>Shih Tzu</option>
			<option>Spitz Japonês</option>
			<option>Staffordshire Bull Terrier</option>
			<option>Weimaraner</option>
			<option>Welsh Corgi Cardigan</option>
			<option>Welsh Corgi Pembroke</option>
			<option>West Highland</option>
			<option>Whippet</option>
			<option>Yorkshire Terrier</option>
			<option>Sem Raça Definida </option>
			<option>Outros </option>
		</select>

			<select id="ga" style="color: black;" name="raca" style="margin-top:15px;">
			<option disabled selected>Selecione uma raça de gato</option>
			<option>Abissínio </option>
			<option>American Shorthair</option>
			<option>Bengal</option>
			<option>Bobtail</option>
			<option>Bengal </option>
			<option>Bobtail</option>
			<option>British Shorthair</option>
			<option>Cornish Rex</option>
			<option>Devon Rex</option>
			<option>Egyptian Mau</option>
			<option>Europeu</option>
			<option>Maine Coon</option>
			<option>Korat</option>
			<option>Himalaio</option>
			<option>Manx</option>
			<option>Munchkin</option>
			<option>Norwegian Forest</option>
			<option>Oriental</option>
			<option>Pêlo Curto Brasileiro</option>
			<option>Persa</option>
			<option>Ragdoll</option>
			<option>Russian Blue</option>
			<option>Sagrado da Birmânia </option>
			<option>Siamês</option>
			<option>Singapura</option>
			<option>Somali </option>
			<option>Sphynx</option>
			<option>Turkish Angora</option>
			<option>Sem Raça Definida</option>
			<option>Outros</option>
		</select>

<br>

			<div class="form-group">
				<input type="radio" name="pet[]" id="adocao" value="adocao"  onclick="perdido()"> Adoçao
				<input type="radio" name="pet[]"  id="achei" value="achei"  onclick=" encontrado()"> Achei
				<input type = "radio" name = "pet[]" id = "perdi" value = "perdi" class="perdi" onclick="perdido()"/> Perdi <br>
				<div id="encontrado">
								<div class='alert alert-warning fade in'> Antes de cadastrar verifique se o animal esta realmente perdido
			 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  </div>
			 </div>
					<div id = "vistou">
						<div id = "perdi" style="color: black;"><label id="txtVisto" style="margin-top:10px; color:red;">*Informe a ultima vez que o animal foi visto</label>
							<div class="input-group date">
										<input type="text" name="visto" id="visto" placeholder="Data" >
					</div>
						</div>
					</div>
<br>
				<input type="text" name="bairro" id="bairro" placeholder="Bairro" required> <br><br>
					<div id="wrapper">
						<div id="image-holder">
							<label style="color: black;"> Foto </label><br> <input type="file" name="foto" id="fileUpload" enctype="multipart/form-data" accept="image/png, image/jpeg">
						</div>
<br><br>
					</div>
									<label style="color: black;"> Descrição</label>
<textarea name="desc" id="desc" rows="5" style="resize: none"; cols="30" maxlength="500"></textarea >
<br><br
<br><br>
				<input type="reset" value="Apagar" class="btn btn-primary btn-lg ">
				<input type="submit" name="enviar" value="Cadastrar" class="btn btn-primary btn-lg " onclick="verficar()" onclick="Checkfiles()"  onclick="CompararData()">
			</div>
	</div>
</div>
		</form>


<?php
//CONSULTA PARA CONTATO 
$codlogin=$_SESSION['codlogin'];
$s = "SELECT * FROM cadastro_pessoas WHERE login='$nome'";
$query = mysqli_query($conexao, $s);
	while($contato = mysqli_fetch_array($query)){
		$no=$contato['nome'];
		$e=$contato['email'];
	}
//FIM

if(isset ($_POST ['enviar'])){
	$desc = $_POST['desc'];
	$bairro = $_POST['bairro'];
	$extensao = pathinfo($_FILES['foto']['name']);
	$extensao = ".".$extensao['extension'];
	$name = time().uniqid(md5()).$extensao;
	$temp=$_FILES['foto']['tmp_name'];
	$raca=$_POST['raca'];
	if(isset($_POST['tipo'])){
	$check=$_POST['tipo'];
	foreach ($check as $tipo) {
	if(isset($_POST['pet'])){
	$anima=$_POST['pet'];

	foreach ($anima as $pet) {
	
	$visto=$_POST['visto'];
	
	}
		if (!isset($_SESSION)) session_start();{
			$codlogin=$_SESSION['codlogin'];
			$sql= "CALL inserir_Animais('".$codlogin."', '".$desc."','".$bairro."','".$name."','".$raca."','".$tipo."','".$pet."')";
			mysqli_query($conexao,$sql);
			move_uploaded_file($temp, "./img/".$name);
			echo"<script> alert('Cadastrado com sucesso');</script>";
		}
		if ($pet=='achei'){
			$sql="Call inserir_Encontrados (LAST_INSERT_ID())";
			mysqli_query($conexao,$sql);
		}
		if ($pet=='perdi'){
			$sql="Call inserir_Procurados ('".$visto."',LAST_INSERT_ID())";
			mysqli_query($conexao,$sql);
			
			
		}
		if ($pet=='adocao'){

			$sql="Call inserir_Adocao (LAST_INSERT_ID())";
			mysqli_query($conexao,$sql);
		}

	}
	}
	}


		}
//E-MAIL




	// CONSULTA ANIMAL
	$sqls="select * from animais order by cod_animais desc limit 1";
	$resu=mysqli_query($conexao,$sqls);	
		while ($linha=mysqli_fetch_array($resu)){
			$animais[]= $linha;
		}
		// CONSULTA DE EMAILS
			$bairro= $_POST['bairro'];
			$sql= "Select * from cadastro_pessoas where bairro='$bairro' AND email NOT IN('$e');";
			$resultado=mysqli_query($conexao,$sql);	
			
				while ($linha=mysqli_fetch_array($resultado)){
					$dado[]= $linha;
				}
				foreach ($dado as $dados){
					$Erro= true;
		foreach ($animais as $animal){
		
		//classe para ultuilizar PHPMailer
		include_once 'PHPMailer/class.smtp.php';
		include_once 'PHPMailer/class.phpmailer.php';

		//metodo do PHPMailer, enviando 
		$Mailer= new PHPMailer(true);
		$Mailer -> charSEt="utf-8";
		$Mailer -> SMTPDebug = 0; //mostra caso erro, o 3 é mais detalhado.
		$Mailer -> IsSMTP();     //metodo stmp no email da hospedagem resto é atributo 
		$Mailer->Host ="br298.hostgator.com.br";
		$Mailer->SMTPAuth = true;  
		$Mailer->Username = "administracao@savepets.com.br";
		$Mailer->Password="01132021";
		$Mailer->STMPSecure= "tls";  //tipo de segurança
		$Mailer->FromName=("Save Pets");
		$Mailer->Port=587;
		$Mailer->From="administracao@savepets.com.br";
		$Mailer->AddAddress($dados['email']);
		$Mailer->AddEmbeddedImage("./img/".$animal["foto"], "logo");
		$Mailer->IsHTML(true);
		$Mailer->Subject="Animal";

			if($animal["perfil"]=="perdi"){
				$Mailer->Body="
					<h1>Animal perdido em sua área </h1>
					<h3> Um pet foi perdido no bairro: ".$_POST['bairro'].". Fique atento!</h3>
					<p>	Descrição do animal: ".$animal['descricao']."</p>
					<p> Caso você tenha visto este animal, entre em contato com ".$no.", ".$e."
					<img src='cid:logo.jpg'>
					<p>Qualquer dúvida procure os administadores do Save Pets: administracao@savepets.com.br</p>
				";	
			}
			if($animal["perfil"]=="achei"){
				$Mailer->Body="
					<h1>Oi! Este animal é seu? </h1>
					<p> Um pet foi encontrado nas ruas do bairro: ".$_POST['bairro'].". Fique atento!</p>
					<p>	Descrição do animal: ".$animal['descricao']."</p>
					<p> Caso o animal é seu, entre em contato com ".$no.", ".$e."
					<p>Qualquer dúvida procure os administadores do Save Pets: administracao@savepets.com.br</p>
					<img src='cid:logo.jpg'>";	
			}
			if($animal["perfil"]=="adocao"){
				$Mailer->Body="
					<h1>Animal para adoção em sua área </h1>
					<p> Um pet está para adoção no bairro: ".$_POST['bairro'].". Adote!</p>
					<p>	Descrição do animal: ".$animal['descricao']."</p>
					<p> Caso queira adotar o animal, entre em contato com ".$no.", ".$e."
					<img src='cid:logo.jpg'>
					";
				
			}					
	
	if($Mailer->Send()){
		$Erro= false;
		header("Location:perfil.php");
	}else{}
			
	}		
		}
		

?>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
</div>
</div>
</div>
</div>
</selection>

		<script type="text/javascript">
			$('#visto').datepicker({
				format: "dd/mm/yyyy",
				language: "pt-BR",
				startDate: '-800d',
				endDate: '0d',
			});
		</script>


</body>
</html>
