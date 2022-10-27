<?php
    include("conexao.php");
    echo "inciando cadastro";
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $senha = md5($_GET['senha']);

   $sql = "INSERT INTO usuario(nome, email, senha)
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
        echo $resposta;
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
        echo $resposta;
    }
        echo "terminou cadastro";


    mysqli_close($conexao);
?>