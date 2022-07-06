<?php
    include("conexao.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

   $sql = "INSERT INTO cadastro_usuario(nome, email, senha)
   VALUES ('$nome', '$email', '$senha')";

    if(mysqli_query($conexao, $sql)){
        $parte1 = array('resultado' => 'ok');
        $parte2 = array('detalhes' => 'ok');
        $resposta = json_encode(
                    array_merge(
                        $parte1,
                        $parte2
                    )
                );
    }

    else{
        $parte1 = array('resultado' => 'erro');
        $parte2 = array('detalhes' => 'não foi possível realizar o cadastro');
        $resposta = json_encode(
                    array_merge(
                        $parte1,
                        $parte2
                    )
                );
    }

    mysqli_close($conexao);
?>