const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const connection = mysql.createPool({ // CONNECTOR MYSQL
  host     : '108.179.252.49',
  user     : 'iclass60_mobAcc', //<<<<<<<
  password : 'DR1hIDVO5,,Z',  //<<<<<<<


  database : 'iclass60_iclassbd'
});

// Starting our app.
const app = express();
const teste =()=>{
  console.log(connection.getConnection())
}
teste();
// Criando Um GET da rota que retorna os dados da Tabela Usuarios
app.get('/users', function (req, res) {
    //Conectando ao Banco
    connection.getConnection(function (err, connection) {
     console.log(connection)
     
    //Executando a query MySQL (select * from the 'users').
    connection.query('SELECT * FROM usuariomob', function (error, results, fields) {
      // Caso Aconteça Erros.
      if (error) throw error;

      // Getting the 'response' from the database and sending it to our route. This is were the data is.
      res.send(results)
      console.log(results)
    });
  });
});

app.listen(2083, () => {
 console.log('Vá para dominio:3306/users e você ve os Dados.');

})