<?php
require_once('conexao_db.php');

$id = $_GET['id'];



if(isset($_POST["editar"])){
    // Dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $dataNascimento = $_POST['dataNascimento'];
    $profissao = $_POST['profissao'];
    $celcontato = $_POST['cel'];
    $possui_whatsapp = isset($_POST['possui_whatsapp']) ? $_POST['possui_whatsapp'] :' Não';
    $notificacoes_sms = isset($_POST['notificacoes_sms']) ? $_POST['notificacoes_sms'] : 'Não';
    $notificacoes_email = isset($_POST['notificacoes_email']) ? $_POST['notificacoes_email'] : 'Não';

    // Declarações da alteração de dados no banco
    $sql = "UPDATE
            tb_cadastro
        SET
            nome_cadastro = ?,
            email_cadastro = ?,
            telcontato_cadastro = ?,
            data_nascimento_cad = ?,
            profissao_cadastro = ?,
            celcontato_cadastro = ?,
            whats_cadastro = ?,
            sms_cadastro = ?,
            notemail_cadastro = ?
        WHERE id_cadastro = ?
    ";
    $prepare = $conexao->prepare($sql);
    $prepare->bind_param(
        'sssssssssd',
        $nome,
        $email,
        $telefone,
        $dataNascimento,
        $profissao,
        $celcontato,
        $possui_whatsapp,
        $notificacoes_sms,
        $notificacoes_email,
        $id
    );
    $prepare->execute();

    if ($prepare->affected_rows > 0) {

        header('Location: pagina_cadastro.php');
    } else {
        $erro = true;
        echo $conexao->error;
    }
}

if (!empty($id) && filter_var($id, FILTER_VALIDATE_INT)) {
    $select = $conexao->query("SELECT * FROM tb_cadastro WHERE id_cadastro ='$id'");

    if ($select) {
        $row = $select->num_rows;
        $f = $select->fetch_assoc();
        if ($row > 0) {
            $nome  = $f['nome_cadastro'];
            $email = $f['email_cadastro'];
            $telefone  = $f['telcontato_cadastro'];
            $dataNascimento  = $f['data_nascimento_cad'];
            $profissao = $f['profissao_cadastro'];
            $celcontato = $f['celcontato_cadastro'];
            $possui_whatsapp = isset($f['whats_cadastro']) ? $f['whats_cadastro'] : "Não";
            $notificacoes_email = isset($f['notemail_cadastro']) ? $f['notemail_cadastro'] : "Não";
            $notificacoes_sms = isset($f['sms_cadastro']) ? $f['sms_cadastro'] : "Não";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de contato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
    crossorigin="anonymous">
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

#editar{
    background-color: #048cd4;
    border:none;
    color:white;
    margin-left: 100px;
    cursor:pointer;
    font-size: 15px;
    border-radius: 10px;
}

#editar:hover
{
    background-color: blue;
}

    </style>
</head>

<body>
<header>
    <img src="imagens/logo_alphacode.png" alt="Logo Alpha Code">
    <h1>Cadastro de Contatos</h1>
</header>
<script language="JavaScript">
function validarForm(){
document.form1.submit(alert('A edição foi efetuada com sucesso')) ;
return true
}

</script>

</script>

    <div class="forms">

        <form id="cadastroforms" method="POST" action="edit.php?id=<?php echo $id ?>" name="form1">
        <div class="ladoalado">
        <div class = "inputBox">
            <input type="text" name="nome" id="nome" class="inputUser" value='<?php echo $nome ?>'required>
            <label for="nome" class="labelInput">Nome completo:</label>
        </div>
        <br><br>
        <div class = "inputBox">
            <label for="DataNascimento"class="labelInput">Data de nascimento:</label><br>
            <input type="date" id="dataNascimento" name="dataNascimento" class="inputUser" value="<?php echo $dataNascimento ?>"required>
        </div>
        <br><br>
        </div>
        <div class="ladoalado2">
        <div class = "inputBox">
            <input type="text" name="email" id="email"  class="inputUser" value="<?php echo $email ?>"required>
            <label for="email"class="labelInput">Email:</label>
        </div>
        <br><br>
        <div class = "inputBox">
             <input type="text" name="profissao" id="profissao"  class="inputUser" value="<?php echo $profissao ?>" required>
            <label for="profissao"class="labelInput">Profissão:</label>
        </div>
        <br><br>
        </div>
        <div class="ladoalado3">
        <div class = "inputBox">
            <input type="tel" name="telefone" id="telefone" class="inputUser"  value="<?php echo $telefone ?>" required>
            <label for="telefone"class="labelInput">Telefone para contato:</label>
        </div>
        <br><br>
        <div class = "inputBox">
            <input type="tel" name="cel" id="celular" class="inputUser" value="<?php echo $celcontato ?>"required>
            <label for="celular"class="labelInput">Celular para contato:</label>
        </div>
        <br>
        </div>
        <div class="ladoalado4">
        <div class = "inputBox">
            <input type="checkbox" name="possui_whatsapp" value="Sim" <?php echo $possui_whatsapp == 'Sim' ? 'checked' : '' ?>>Número de celular possui whatsapp
                <input type="checkbox" name="notificacoes_email" value="Sim" <?php echo $notificacoes_email == 'Sim' ? 'checked' : '' ?>>Enviar notificações por Email
        </div>
        </div>
        <br>

            <p>
                 <input type="checkbox" name="notificacoes_sms" value="Sim" <?php echo $notificacoes_sms == 'Sim' ? 'checked' : '' ?>>Enviar notificações por SMS

                <button type="submit" id="editar" name="editar" class="btnEdit" onclick="javascript: return validarForm()"> Editar contato</button>

            </p>
    </div>
    </form>

    <?php require_once('consulta.php'); ?>

<footer>
<div class = "esquerda">
<p class = "terms"> Termos | Políticas</p>
<p class = "copy" > © Copyright 2022 | Desenvolvido por</p>
</div>
<img src="imagens/logo_rodape_alphacode.png" alt="Logo Alpha Code" width="110" >
<div class="direita">
<p class = "solutions">©Alphacode IT Solutions 2023 </p>
</div>

</footer>
</body>
</html>