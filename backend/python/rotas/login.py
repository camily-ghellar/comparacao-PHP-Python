# importações
from geral import *
from modelo.usuario import *

@app.route("/login", methods=['POST'])
def login():
    resposta = jsonify({"resultado": "ok", "detalhes": "ok"})

    # receber as informações do novo objeto
    dados = request.get_json()  
    login = dados['login']
    senha = dados['senha']

    if login == 'mylogin' and senha == '123':
        # armazenar sessão
        session[login] = "OK"
    else:
        resposta = jsonify({"resultado": "erro", "detalhes": "login e/ou senha inválido(s)"})        
    resposta.headers.add("Access-Control-Allow-Origin", meuservidor)
    return resposta