<?php

$mysqli_select = new mysqli("localhost", "root", "", "db_testeestagio");
include_once('conexao_db.php');
$sql = "SELECT * FROM tb_cadastro ORDER BY id_cadastro DESC";
$result2 = mysqli_query($mysqli_select, $sql);


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<style>

.crud th{
background-color: #048cd4;
color:white;
padding: 2px;


}

</style>


<div class = "m-5">
<table cellSpacing=6 cellPadding=6>
  <thead>
    <tr class="crud">
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Email</th>
      <th scope="col">Celular</th>
      <th scope="col">Telefone</th>
      <th scope="col">Profissão</th>
      <th scope="col">Possui Whatsapp</th>
      <th scope="col">Notificações por Email</th>
      <th scope="col">Notificações por SMS</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $caminhoDaImagem = "imagens/editar.png";
    $descricaoDaImagem = "Botão de editar";
    $caminhoDaImagem2 = "imagens/excluir.png";
    $descricaoDaImagem2 = "Botão de excluir";

     while($user_data = mysqli_fetch_assoc($result2))
     {

        echo "<tr>";
        echo "<td>".$user_data['id_cadastro']."</td>";
        echo "<td>".$user_data['nome_cadastro']."</td>";
        echo "<td>".$user_data['data_nascimento_cad']."</td>";
        echo "<td>".$user_data['email_cadastro']."</td>";
        echo "<td>".$user_data['celcontato_cadastro']."</td>";
        echo "<td>".$user_data['telcontato_cadastro']."</td>";
        echo "<td>".$user_data['profissao_cadastro']."</td>";
        echo "<td>".$user_data['whats_cadastro']."</td>";
        echo "<td>".$user_data['notemail_cadastro']."</td>";
        echo "<td>".$user_data['sms_cadastro']."</td>";
        echo "<td>". "<button type = 'button' onclick=location.href='edit.php?id=$user_data[id_cadastro]';>"."<img src = '$caminhoDaImagem' alt = '$descricaoDaImagem'> </button>"."</td>";
        echo "<td>". "<button type = 'button' onclick=location.href='delete.php?id=$user_data[id_cadastro]';> <img src = '$caminhoDaImagem2' alt = '$descricaoDaImagem2'> </button>"."</td>";
        echo "<tr>";
     }


    ?>


  </tbody>
</table>
</div>
</div>