<?php
require_once('conexao_db.php');

if (isset($_POST["cadastrar"])) {


    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $dataNascimento = $_POST['dataNascimento'];
    $profissao = $_POST['profissao'];
    $celcontato = $_POST['cel'];
    $checkwhatsapp = isset($_POST['whatsapp']) ? $_POST['whatsapp'] : "Não";
    $checkemailval = isset($_POST['emailval']) ? $_POST['emailval'] : "Não";
    $checksms = isset($_POST['sms']) ? $_POST['sms'] : "Não";

    $query = "INSERT INTO tb_cadastro (nome_cadastro, data_nascimento_cad, email_cadastro, celcontato_cadastro, telcontato_cadastro, profissao_cadastro, whats_cadastro, sms_cadastro, notemail_cadastro) VALUES ('$nome', '$dataNascimento', '$email', '$celcontato', '$telefone', '$profissao', '$checkwhatsapp','$checksms', '$checkemailval' )";
    $result1 = mysqli_query($conexao, $query);
    header("Location: " . $_SERVER['PHP_SELF']);

    $prepare = $conexao->prepare($sql);
    $prepare->bind_param(
        'sssssssss',
        $nome,
        $email,
        $telefone,
        $dataNascimento,
        $profissao,
        $celcontato,
        $possui_whatsapp,
        $notificacoes_sms,
        $notificacoes_email

    );
    $prepare->execute();

    if ($prepare->affected_rows > 0) {
        header('Location: pagina_cadastro.php');
    } else {
        $erro = true;
        echo $conexao->error;
    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de contato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <style>
    .body{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

    .box-search{
    display: flex;
    justify-content: center;
    gap: 0.2em;
}
.forms{
    display: flex;
    justify-content: center;


}

.ladoalado{
    display: flex;
    align-items: center;
    justify-content:space-between;
}

.ladoalado2{
    display: flex;
    align-items: center;
    justify-content:space-between;
}

.ladoalado3{
    display: flex;
    align-items: center;
    justify-content:space-between;
}

.inputBox
{
    position: relative;
    margin-top:15px;

}

.inputUser{
    background:none;
    border:none;
    border-bottom: 1px solid black;
    outline:none;
    font-size: 15px;
    width: 100%;
    letter-spacing: 2px;
}


.btnCad
{
    display:inline;
    width: 35%;
}

header
{
    width: auto;
    height: auto;
    background-color:#048cd4;
    display: flex;
    align-items: center;
    color: white;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    border-radius: 30px;
}

.labelInput
{
    position: absolute;
    top:0px;
    left:0px;
    pointer-events: none;
    transition: .5s;
}

.inputUser:focus ~ .labelInput,.inputUser:valid ~ .labelInput{
top: -20px;
font-weight: 12px;
color:#048cd4;
}

#cadastrar{
    background-color: #048cd4;
    border:none;
    color:white;
    margin-left: 100px;
    cursor:pointer;
    font-size: 15px;
    border-radius: 10px;
}

#cadastrar:hover
{
    background-color: blue;

}

footer
{
    width: auto;
    height: 150px;
    background-color:#048cd4;
    display: flex;
    align-items: center;
    color: white;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 25px;
    border-radius: 10px;
    color: white;
    padding: 20px;
}

.esquerda{
    display: flex;
}

.copy{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    margin-left:200px ;
}

.solutions{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    margin-left:90px ;
}



.ladoalado4{
    display: flex;
    align-items: center;
    justify-content:space-between;
}



</style>

</head>
<body>

<header>
    <img src="imagens/logo_alphacode.png" alt="Logo Alpha Code">
    <h1>Cadastro de Contatos</h1>
</header>



<script Language="JavaScript">

function validaForm()
{
    const telnumero = document.getElementById("telefone");
    const celnumero = document.getElementById("celular");
    const valor1 = telnumero.value.trim();
    const valor2 = celnumero.value.trim();

	if ( document.getElementById('nome').value.length == "")
    {
		alert('Por favor preencha o campo Nome');
		form1.nome.focus();
		return false
	}

	if ( document.getElementById('dataNascimento').value.length == "")
	{
		alert('Por favor preencha o campo Data de Nascimento');
		form1.dataNascimento.focus();
		return false
	}

	if ( document.getElementById('email').value.length == "")
	{
		alert('Por favor preencha o campo Email');
		form1.email.focus();
		return false
	}

    if ( document.getElementById('profissao').value.length == "")
    {
        alert('Por favor preencha o campo Profissao');
        form1.profissao.focus();
        return false
    }

    if ( document.getElementById('telefone').value.length == "")
    {
        alert('Por favor preencha o campo Telefone');
        form1.telefone.focus();
        return false
    }

    if ( document.getElementById('celular').value.length == "")
    {
        alert('Por favor preencha o campo celular');
        form1.cel.focus();
        return false
    }

    if(document.getElementById('nome').value.length <= 3)
    {
        alert('O campo nome precisa ser preenchido com mais de 3 caracteres');
        form1.nome.focus();
        return false
    }


    if (valor1 === "" || isNaN(valor1))
    {
        alert('O campo telefone precisa ser preenchido corretamente');
        form1.nome.focus();
        return false
    }

    if(valor2 === "" || isNaN(valor2))
    {
        alert('O campo celular precisa ser preenchido corretamente');
        form1.nome.focus();
        return false
    }

	document.form1.submit(alert('O cadastro foi efetuado com sucesso')) ;

	return true
}
</script>


    <div class="forms">

        <form id="cadastroforms" method="POST" action="pagina_cadastro.php" name="form1">
        <div class="ladoalado">
        <div class = "inputBox">
        <input type="text" name="nome" id="nome" class="inputUser" required>
        <label for="nome" class="labelInput">Nome completo:</label>
        </div>
        <br><br>


        <div class = "inputBox">
            <label for="DataNascimento"class="labelInput">Data de nascimento:</label><br>
            <input type="date" id="dataNascimento" name="dataNascimento" class="inputUser" required>
        </div>
        <br><br>
        </div>
        <div class="ladoalado2">
        <div class = "inputBox">
            <input type="text" name="email" id="email"  class="inputUser" required>
            <label for="email"class="labelInput">Email:</label>
        </div>
        <br><br>
        <div class = "inputBox">
             <input type="text" name="profissao" id="profissao"  class="inputUser" required>
            <label for="profissao"class="labelInput">Profissão:</label>
        </div>
        <br><br>
        </div>

        <div class="ladoalado3">
        <div class = "inputBox">
            <input type="tel" name="telefone" id="telefone" class="inputUser" required>
            <label for="telefone"class="labelInput">Telefone para contato:</label>
        </div>
        <br><br>
        <div class = "inputBox">
        <input type="tel" name="cel" id="celular" class="inputUser" required>
        <label for="celular"class="labelInput">Celular para contato:</label>
        </div>
        <br>
        </div>
        <div class="ladoalado4">
        <p>
                <input type="checkbox" name="whatsapp" value="Sim">Número de celular possui whatsapp

                <input type="checkbox" name="emailval" value="Sim">Enviar notificações por Email
            </p>
        </div>

            <p>
                <input type="checkbox" name="sms" value="Sim">Enviar notificações por SMS

                <button type="submit" id="cadastrar" name="cadastrar" class="btnCad" onclick="javascript: return validaForm()"> Cadastrar contatos</button>

            </p>


    </div>
    </form>


<?php

include_once('consulta.php');

?>


<footer>
<div class = "esquerda">
<p class = "terms"> Termos | Políticas</p>
<p class = "copy" > © Copyright 2022 | Desenvolvido por</p>
</div>
<img src="imagens/logo_rodape_alphacode.png" alt="Logo Alpha Code" width="110" >
<div class="direita">
<p class = "solutions">©Alphacode IT Solutions 2022 </p>
</div>
</footer>
</body>


</html>