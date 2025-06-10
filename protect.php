<?php
if (isset($_SESSION['usuario'])) {
    echo $_SESSION['usuario'];
} else {
    die('Você não pode acessar esta página porque não está logado. <p><a href="index.php">Entrar</a></p>');
}

?>