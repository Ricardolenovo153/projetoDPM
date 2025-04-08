<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
        // Redireciona ou mostra área de admin
    } else {
        // Redireciona ou mostra área de usuário normal
        header("Location:../index.php");
    }

    ?>
    <div class="container">
        <a class="utilizador" href="../index.php">Menu Utilizador</a>
        <a class="admin" href="admin.html">Menu Admin</a>   
    </div>
 
</body>
</html>