# importação
import os
from geral import arquivobd, db, app
import import_modelos

with app.app_context():
    if os.path.exists(arquivobd):
        os.remove(arquivobd)

    # criar tabelas
    db.create_all()

    print("Banco de dados e tabelas criadas")