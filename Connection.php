<?php
  $host = "localhost";
  $user = "root";
  $pass = "root";
  $dbname = "lojavirtual";
  $port = 3306;
  try{
    $conn = new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);
    // ECHO "Conexão realizada com sucesso!<br>"
  } catch (Exception $ex) {
    // ECHO "Conexão não realizada com sucesso!<br>"
    die("Erro: Por favor tente novamente. Caso o problema persista, entre em contado com o admeinstrador");
  }
?>
