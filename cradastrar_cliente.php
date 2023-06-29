<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
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

input, label  {   
  display: block;
  width: 80%;  
  margin: 10px auto;
}

input {
  padding: 5px;
  background-color: #444;
  border: 1px solid #666;
  color: #fff;
}

input:focus {
  background-color: #111;  
  outline: none;  
}

button {
  background-color: #555;  
  color: #fff;  
  padding: 10px 20px;
  border: none;
  margin: 20px auto;
  display: block;
  width: 80%;  
}

button:hover {
  background-color: #444;
}


@media (max-width: 500px) {  
  input, label, button {
    width: 90%;
  } 
}

.error {
  color:red;
}
</style>
    
</head>

<body>
    <a href="./index.php">Voltar para a list</a>
    <form action="cradastrar_cliente.php" method="post">
        <h1>cadastrar cliente</h1>

        <p>
            <label>
                nome:
            </label>
            <input value="<?php if (isset($_Post["nome"])) {
                                echo $_POST["nome"];
                            } ?>" name="nome" type="text" required>
        </p>

        <p>
            <label>email:</label>
            <input value="<?php if (isset($_Post["email"])) {
                                echo $_POST["email"];
                            } ?>" name="email" type="text" required>
        </p>

        <p>
            <label>telefone:</label>
            <input value="<?php if (isset($_Post["telefone"])) {
                                echo $_POST["telefone"];
                            } ?>" name="telefone" placeholder="(55)131234-56789" type="text">
        </p>
        <p><label>data de nascimento:</label><input value="<?php if (isset($_Post["nascimento"])) echo $_POST["nascimento"]; ?>" name="nascimento" type="text" required></p>
        <button type="submit">submit</button>
    </form>


    <?php
    include('conexao.php');
    include("funcoes.php");


function mostra_erro($erro){
    echo "<div class='error'>$erro</div><br>";
    return;
}

  
    if (count($_POST) > 3) {
        $erro_email = false;
        $erro_nascimento = false;
        $erro_nome = false;
        $erro_telefone = false;
    

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $nascimento = $_POST["nascimento"];

        //se nome = vaziou ou nome="" ou nome = null
        if (empty($nome) || $nome == " " || $nome = NULL) {
            $erro_nome = "preencha o nome corretamente";
        };
         if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || $email == " " && $email = NULL) {
            $erro_email = "preencha o email";
        };
         if (!empty($nascimento) && $nascimento != " ") {
            $pedacos = explode('/', $nascimento);
            if (count($pedacos) == 3) {
                $nascimento =  implode('-', array_reverse($pedacos));
            } else {
                $erro_nascimento = "preencha o a data de nascimento no padrao dia/mes/ano";
            }
        };
         if (!empty($telefone)) {
            $telefone = limpartexto($telefone);
            // (1 2) 3 4 5 6 - 7 8 9 10 11
            if (strlen($telefone) != 11 && strlen($telefone) != 13){
                $erro_telefone = "preencha o telefone no padra (13)1234-1234";
        }}
    

    //se nenhum dos erros forem true, mandar para o sql
    if ($erro_nome == true || $erro_email == true || $erro_telefone == true || $erro_nascimento == true) {
        if ($erro_nome == true) {
            mostra_erro($erro_nome);
        }else if($erro_email == true) {
            mostra_erro($erro_email);
        }else if ($erro_telefone == true) {
            mostra_erro($erro_telefone);
        }else if ($erro_nascimento == true) {
            mostra_erro($erro_nascimento);
        }
    }else if ($erro_nome == false  && $erro_email == false && $erro_telefone == false && $erro_nascimento == false) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);  
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $data = date("");
        //inserir na tabela cliente nome, email, telefone, nascimento e data
        $sql_code = "INSERT INTO clientes (nome, email, telefone, nascimento, data) 
    VALUES('$nome' ,'$email','$telefone', '$nascimento',NOW())";
        $mysqli->query($sql_code) or die($mysqli->error);
    
    ?>
    <h2>cliente cadastrado com sucesso</h2>
    <a href="index.php">ir para a pagina de clientes</a>
<?php
}}
?>
</body>

</html>