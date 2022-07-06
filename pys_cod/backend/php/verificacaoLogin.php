<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        // Acessa o sistema
        include_once('conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM cadastro_usuario WHERE email = '$email' and senha = md5('$senha')";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result)<1){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);

        }

        // Entrou no site
        else{
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
        }
    }

?>