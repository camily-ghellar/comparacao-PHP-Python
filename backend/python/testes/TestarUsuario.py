# importações
from geral import *
from modelo.usuario import Usuario

def run():
    print("TESTE DE USUÁRIO")
    
    p1 = Usuario(nome = "Uriarte", email = "uriarte@gmail.com", senha = "uriarte123")
    p2 = Usuario(nome = "professor", email = "camily@gmail.com", senha = "456")

    db.session.add(p1)
    db.session.add(p2)
    
    db.session.commit()
    print(p1, p2)