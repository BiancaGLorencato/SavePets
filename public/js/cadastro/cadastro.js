jQuery(function($){
   // $("#nascimento").mask("99/99/9999");

    $("#cep").focusout(function(){
        $.ajax({
        //O campo URL diz o caminho de onde virá os dados
        url: 'https://viacep.com.br/ws/'+$(this).val()+'/json',
        dataType: 'json',
        success: function(resposta){
            $("#rua").val(resposta.logradouro);
            $("#bairro").val(resposta.bairro);
            $("#cidade").val(resposta.localidade);
            $("#numero").focus();
        }
     });
    });
});
function id( el ){
    return document.getElementById( el );
}
window.onload = function(){
    id('termo').style.display = 'none'; 
}

function Termos(el) { //quando o usuario clicar nos termos de uso que tem essa função a div com os termos vai aparecer ou sumir
    var display = document.getElementById(el).style.display;
    if(display == "none")
        document.getElementById(el).style.display = 'block';
    else
        document.getElementById(el).style.display = 'none';
}

function validarSenha(){
    senha = document.getElementById('senha').value;
    confirmesenha = document.getElementById('confirmesenha').value;

        if (confirmesenha != senha) {
            event.preventDefault(); //ESSA LINHA PREVINE QUE A PAGINA SEJA ATUALIZADA
            alert("As senhas não são iguais");
            document.getElementById('senha').value="";
            document.getElementById('confirmesenha').value="";
        }else{
            document.form1.submit();
            alert ('Cadastrado com sucesso');

        }
}

