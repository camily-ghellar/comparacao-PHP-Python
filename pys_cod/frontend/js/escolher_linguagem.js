$(function () { // escolher a linguagem do site
    
    $(document).on("click", "#bt_php", function () {
        //guarda na sessão que a linguagem escolhida é o php
        sessionStorage.setItem('linguagem_usada', 'php');

        // encaminha para a página de cadastro
        window.location = 'cadastrar.html'; });

    $(document).on("click", "#bt_flask", function () {
        //guarda na sessão que a linguagem escolhida é o flask
        sessionStorage.setItem('linguagem_usada', 'flask');
    
        // encaminha para a página de cadastro
        window.location = 'cadastrar.html'; });
});


    //<select id="fonte">   ACHO Q VAI NO HTML
    //<option value="http://localhost:5000">Python</option>
    //<option value="http://localhost">PHP</option>
    //</select>
