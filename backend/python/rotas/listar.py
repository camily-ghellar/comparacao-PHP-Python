# importações
from geral import *
from modelo.usuario import *

@app.route("/listar/<string:classe>")
def listar(classe):
    # obter os dados da classe informada
    dados = None
    if classe == "Usuario":
      dados = db.session.query(Usuario).all()

    # converter dados para json
    lista_jsons = [x.json() for x in dados]
    # converter a lista do python para json

    resposta = jsonify(lista_jsons)
    resposta.headers.add("Access-Control-Allow-Origin", meuservidor)
    return resposta

# https://stackoverflow.com/questions/2870371/why-is-jquerys-ajax-method-not-sending-my-session-cookie