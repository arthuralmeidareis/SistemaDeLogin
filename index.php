<?php
include('conexao.php');
if (isset($_POST['email'])|| isset($_POST['senha'])) {
    
    if (strlen($_POST['email']) == 0) {
        echo "Preencha o seu email";
        
    }
    elseif(strlen($_POST[ 'senha']) == 0){
    echo "preencha sua senha";
    }
    else{
        $email =$mysqli -> real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']); 

        $sql_code  = "SELECT * FROM usuarios WHERE email = '$email' and senha ='$senha'";
        $sql_query = $mysqli ->query($sql_code) or die ("falha na execução do código sql: ".$mysqli_error);


        $quantidade = $sql_query -> num_rows;

        if ($quantidade == 1) {
            $usuario =$sql_query ->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] =  $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("location:painel.php");
 
        } else{
            echo"email ou senha incorretos";
        }

          }
}
?>

<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Login</title>
</head>
<body>
    <h1>Acesse sua conta</h1>
    </p>
     <form action="" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email">
</p>
<p>
    <label for="senha">Senha</label>
    <input type="password" name="senha">
</p>
<p>
    <Button type ="submit">Entrar</Button>
</p>
     </form>
</body>
</html>