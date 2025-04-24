<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body> 
    <?php
    session_start();
    ?>

<header>
    <div class="header">
        <div class="logo">
            <h1>Peregrine Showroom</h1>
            <img src="imagens/logo.png" width="80px" height="50px" alt="">
        </div>
        <div class="links">
            <p><a href="index.php" class="link active">Home <i class="fa-solid fa-house"></i></a></p>
            <p><a href="index.php#card-container" class="link">Catálogo <i class="fa-solid fa-car-side"></i></a></p>
            <p>
            <?php
                if (isset($_SESSION['user_id'])) {
                    $user_name = $_SESSION['user_name'] ?? '';
                    echo '<a href="welcome.php" class="link">' . htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8') . ' <i class="fa-solid fa-user"></i></a>';
                } else {
                    echo '<a href="account.html" class="link">Conta <i class="fa-solid fa-user"></i></a>';
                }
                ?>
            </p>
        </div>
    </div>
    <hr>
</header>

    <?php require_once 'php/connection.php'; ?>
    <?php
    $sql = "SELECT * FROM carro";
    $result = $conn->query($sql);

    ?>
    <div class="card-container">
    <?php
    if ($result->num_rows > 0) {
        while ($carro = $result->fetch_assoc()) {
            ?>
            <div class="card">
                <img src="<?php echo $carro['imagem']; ?>" alt="<?php echo $carro['modelo']; ?>">
                <div class="card-content">
                    <h2 class="card-title"><?php echo $carro['marca'] . ' ' . $carro['modelo']; ?></h2>
                    <?php echo !empty($carro['subModelo']) ? $carro['subModelo'] : '⠀'; ?>
                    <p class="card-text">
                        <i class="fas fa-horse-head"></i> <strong>Potência:</strong> <?php echo $carro['potencia']; ?><br>
                        <i class="fas fa-calendar-alt"></i> <strong>Ano:</strong> <?php echo $carro['ano']; ?><br>
                        <i class="fas fa-gas-pump"></i> <strong>Combustível:</strong> <?php echo $carro['combustivel']; ?><br>
                        <i class="fas fa-road"></i> <strong>Quilometragem:</strong> <?php echo number_format($carro['kilometros'], 0, ',', '.') . ' km'; ?><br>
                        <i class="fas fa-cogs"></i> <strong>Transmissão:</strong> <?php echo $carro['transmissao']; ?><br>
                        <i class="fas fa-door-closed"></i> <strong>Portas:</strong> <?php echo $carro['nPortas']; ?><br>
                    </p>
                    <div class="card-price">€ <?php echo number_format($carro['preco'], 2, ',', '.'); ?></div>
                    <a href="#" class="card-button">Comprar</a>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>Nenhum carro encontrado.</p>";
    }
    

    $conn->close();
    ?>
    
    </div>
    
</body>
</html>