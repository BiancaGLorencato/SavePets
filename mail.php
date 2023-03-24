<?php
include ('conexao.php');

$bairro= $_POST['bairro'];

$sql= "Select * from cadastro_pessoas where bairro='$bairro'";
$resultado=mysqli_query($conexao,$sql);	
while ($linha=mysqli_fetch_array($resultado)){
			$dado[]= $linha;
		}

		
foreach ($dado as $dados){

$Erro= true;



//classe para ultuilizar PHPMailer

include_once 'PHPMailer/class.smtp.php';
include_once 'PHPMailer/class.phpmailer.php';

//metodo do PHPMailer, enviando 
$Mailer= new PHPMailer(true);
$Mailer -> charSEt="utf-8";
$Mailer -> SMTPDebug = 3; //mostra caso erro, o 3 é mais detalhado.
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

$Mailer->IsHTML(true);
$Mailer->Subject="Animal";
$Mailer->Body="teste";


if($Mailer->Send()){
    $Erro= false;
	header("Location:perfil.php");
}else{
	var_dump($Erro);

}




}

?>

