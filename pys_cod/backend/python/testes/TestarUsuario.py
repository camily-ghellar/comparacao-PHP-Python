# importações
from geral import *
from modelo.usuario import Usuario

def run():
    print("TESTE DE USUÁRIO")
    
    p1 = Usuario(nome = "Alice", email = "alice@gmail.com", senha = "123")
    p2 = Usuario(nome = "Camily", email = "camily@gmail.com", senha = "456")

    db.session.add(p1)
    db.session.add(p2)
    
    db.session.commit()
    print(p1, p2)