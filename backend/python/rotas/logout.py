# importações
from geral import *
from modelo.usuario import *

@app.route("/logout", methods=['POST'])
def login():
    resposta = jsonify({"resultado": "ok", "detalhes": "ok"})

    # receber as informações do novo objeto
    dados = request.get_json()

    # remover o usuário da sessão
    session.pop(dados['login'], default=None)
    resposta.headers.add("Access-Control-Allow-Origin", meuservidor)
    return resposta