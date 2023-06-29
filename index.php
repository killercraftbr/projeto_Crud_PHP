<!DOCTYPE html>
<html lang="en">
    <?php
    include("funcoes.php");
    include('conexao.php');


    $sql_clientes ="SELECT * FROM clientes";
    $query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
    $num_clientes = $query_clientes ->num_rows;
 
    ?>
<head>
    <style>/* Dark background and text colors */
body {
  background-color: #2e2e2e;
  color: #fff;
}

/* Links turn light on hover */  
a {
  color: #fff; 
}

a:hover {
  color: #ddd;
}

/* Table has a dark background */
table {
  background-color: #333;
}

/* Dark border and header colors */ 
th, td {
  border-color: #555;  
}

th {
  background-color: #444;  
}

/* Error messages still stand out */
.error {
  color: red;
}

/* Responsively center elements */  
h1 {
  text-align: center;
}
p {
  text-align: center;
}
table {
  margin: 0 auto;  
}
button{
    text-align: center;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./cradastrar_cliente.php"><button> cadastrar cliente</button></a><br>
    <h1>Listas de clientes</h1>
    <p>Estes sao os clientes cadastrados no seu sistema</p>
  <table border ="4" cellpadding="10">
    <thead>
        <th>id</th>
        <th>nome</th>
        <th>email</th>
        <th>telefone</th>
        <th>nascimento</th>
        <th>data de cadastro</th>
        <th>Açoes</th>
    </thead>
    <tbody>
        <?php
        if($num_clientes ==0){ ?>
            <tr>
            <td colspan="7">Nenhum cliente foi cadastado</td>   
        </tr>
        <?php } else {
            while($cliente = $query_clientes->fetch_assoc()){
            $telefone = formatar__telefone($cliente["telefone"]) ;
            $nascimento = formatar_data($cliente["nascimento"])?>
        <tr>
        <td><?php echo $cliente["id"];?></td>
        <td><?php echo $cliente["nome"];?></td>
        <td><?php echo $cliente["email"];?></td>
        <td><?php echo $telefone;?></td>
        <td><?php echo $nascimento;?></td>
        <td><?php echo $cliente["data"];?></td>
        <td> <a href="editar_cliente.php?id=<?php echo $cliente["id"];?>">editar</a>
    <a href="deletar_cliente.php?id=<?php echo $cliente["id"];?>">deletar</a></td>
        
        </tr>
        <?php }}   ?>
    </tbody>
  </table>     

</body>
</html>