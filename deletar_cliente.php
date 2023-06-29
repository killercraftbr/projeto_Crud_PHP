<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
  background-color: #333; 
  color: #fff;
  font-family: Arial, sans-serif;
}

h1 {
  text-align: center;
}

a {  
  color: #fff;  
  text-decoration: none;
}

a:hover { 
  color: #ddd;
}

button {
  background-color: #555;
  color: #fff;
  padding: 10px;    
  border: none;
  margin:10px 20px;
  display: inline-block;
}

button:hover {
  background-color: #444;
}

@media (max-width: 500px) {   
  button {
    display: block;
    width: 80%; 
    margin: 10px auto;    
  }
}

.sucesso {
  color: green;      
}

.error {
  color: red;    
}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php

if(isset($_POST["confirmar"])){
    include("conexao.php");

    $id = intval($_GET["id"]);
    $sql_code = "DELETE FROM clientes WHERE id = $id";
    $sql_query= $mysqli ->query($sql_code) or die($mysqli->error);
    if ($sql_query){ ?>
    <h1>Cliente deletado com sucesso"</h1>
    <p><a href="./index.php"> clique aqui para voltar a lista de clientes</p></a>
<?php
die;
}}
?>
</head>
<body>
    <h1>tem certeza que deseja deletar esse cliente?</h1>
  <form action="" method="post">
    <button name="confirmar" value="1">sim</button><br><br>
</form>
<a href="index.php" ><button submit>nao</button></a>

</body>
</html>