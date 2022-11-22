$(function () { // quando o documento estiver pronto/carregado

    linguagem_usada = sessionStorage.getItem("linguagem_usada");
    
    // código para mapear click do botão cadastro
    $(document).on("click", "#bt_cadastrar", function () {
        //pegar dados da tela
        nome= $("#nome").val();
        email = $("#email").val();
        senha = $("#senha").val();

        var senha = md5(senha);

        // preparar dados no formato json
        var dados = JSON.stringify({ nome:nome, email:email, senha:senha });

        // fazer requisição para o back-end
        if (linguagem_usada=='php')
            url= 'http://localhost/cadastro.php';
        else
            url='http://localhost:5000/cadastro_login';

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json', // os dados são recebidos no formato json
            contentType: 'application/json', // tipo dos dados enviados
            data: dados, // estes são os dados enviados
            success: cadastroOk, // chama a função listar para processar o resultado
            error: function () {
                alert("Erro na conexão, verifique o backend. ");
                // https://api.jquery.com/jquery.ajax/
            }
        });
        function cadastroOk(retorno) {
            if (retorno.resultado == "ok") { // a operação deu certo?
                // encaminha para a página de login
                window.location = 'entrar.html';
            } else {
                // informar mensagem de erro
                alert("ERRO: " + retorno.resultado + ":" + retorno.detalhes);
            }
        }

    });

});