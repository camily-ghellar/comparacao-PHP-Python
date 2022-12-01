# importações

from flask import Flask, jsonify, request, session
from flask_sqlalchemy import SQLAlchemy
from flask_session import Session
import os
import datetime
from datetime import timedelta

# permitir que o backend receba o json do front
from flask_cors import CORS

# configurações
app = Flask(__name__)

meuservidor = "http://localhost:81"

CORS(app)

# caminho do arquivo de banco de dados
path = os.path.dirname(os.path.abspath(__file__))
arquivobd = os.path.join(path, 'usuario.db')

# sqlalchemy
#app.config['SQLALCHEMY_DATABASE_URI'] = "sqlite:///"+arquivobd
#app.config['SQLALCHEMY_DATABASE_URI'] = "mysql+pymysql://root:@localhost/cadastro_pys"
app.config['SQLALCHEMY_DATABASE_URI'] = "mysql+pymysql://root:root@localhost/cadastro_pys" #usado na escola

app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False  # remover warnings
db = SQLAlchemy(app)

# https://flask-session.readthedocs.io/en/latest/
# https://github.com/fengsp/flask-session/blob/master/test_session.py#L69
app.secret_key = '$#EWFGHJUI*&DEGBHYJU&Y%T#RYJHG%##RU&U'
app.config["SESSION_PERMANENT"] = False
app.config["SESSION_TYPE"] = "filesystem"
app.config['PERMANENT_SESSION_LIFETIME'] = timedelta(minutes=2)
app.app_context().push()
Session(app)

# remoção automática dos arquivos
# https://stackoverflow.com/questions/53841909/clean-server-side-session-files-flask-session-using-filesystem