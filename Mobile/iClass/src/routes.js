const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const connection = mysql.createPool({ // CONNECTOR MYSQL
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'iclassbd'
});

// Starting our app.
const app = express();
// Criando Um GET da rota que retorna os dados da Tabela Usuarios
app.get('/users', function (req, res) {
    //Conectando ao Banco
    connection.getConnection(function (err, connection) {

    //Executando a query MySQL (select * from the 'users').
    connection.query('SELECT matricula FROM usuariomob', function (error, results, fields) {
      // Caso Aconteça Erros.
      if (error) throw error;

      // Getting the 'response' from the database and sending it to our route. This is were the data is.
      res.send(results)
    });
  });
});

// Iniciando o servidor.
app.listen(3000, () => {
 console.log('Vá para http://localhost e você ve os Dados.');

});
