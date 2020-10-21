const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const connection = mysql.createPool({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'iclassbd'
});

// Isso ainda é no routes.js! Logo abaixo dos outros códigos.
// Iniciando o app.
const app = express();
// Criando uma rota GET que retorna os dados da tabela usuários.
app.get('/usuariomob', function (req, res) {
    // Conectando ao banco.
    connection.getConnection(function (err, connection) {
    
    // Executando a query MySQL (selecionar todos os dados da tabela usuário).
    connection.query('SELECT * FROM usuariomob', function (error, results, fields) {
      // Caso ocorra algum erro, não irá executar corretamente.if (error) throw error;
      
      // Pegando a 'resposta' do servidor pra nossa requisição. Ou seja, aqui ele vai mandar nossos dados.
      res.send(results)
    });
  });
});

// Iniciando o servidor.
app.listen(3000, () => {
 console.log('Vai no navegador e entra em http://localhost:3000/users pra ver os usuários cadastrados.');
});