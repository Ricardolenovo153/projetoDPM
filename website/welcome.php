<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION['user_name']; ?>!</h1>
    <p>Email: <?php echo $_SESSION['user_email']; ?></p>
    <a href="php/logout.php">Sair</a>

    
</body>
</html>