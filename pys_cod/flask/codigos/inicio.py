import os
from flask import Flask

def create_app(test_config=None):
    # create and configure the app
    app = Flask(__name__, instance_relative_config=True)
    app.config.from_mapping(
        SECRET_KEY='dev', # para ter dados seguros (deve-se mudar o "dev" posteriormente)

        # 04/05 - mudamos 'flaskr.sqlite' para 'codigos.sqlite'
        # caminho onde o arquivo de banco de dados SQLite será salvo
        DATABASE=os.path.join(app.instance_path, 'codigos.sqlite'),
    )

    if test_config is None:
        # load the instance config, if it exists, when not testing
        app.config.from_pyfile('config.py', silent=True)
    else:
        # load the test config if passed in
        # serve para que os testes criados posteriormente possam ser configurados
        # independentemente dos valores de desenvolvimento já configurados.
        app.config.from_mapping(test_config)

    # ensure the instance folder exists
    try:
        # os.makedirs()garante que app.instance_path exista
        os.makedirs(app.instance_path)
    except OSError:
        pass

    # abrir url
    @app.route('/hello')
    def hello():
        return 'Hello, World!'
    return app