<?php include '../php/connection.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM carro WHERE id=$id");
$carro = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $subModelo = $_POST['subModelo'];
    $nPortas = $_POST['nPortas'];
    $potencia = $_POST['potencia'];
    $transmissao = $_POST['transmissao'];
    $kilometros = $_POST['kilometros'];
    $combustivel = $_POST['combustivel'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];
    $ano = $_POST['ano'];
    $conn->query("UPDATE carro SET marca='$marca', modelo='$modelo', subModelo='$subModelo', nPortas='$nPortas', potencia='$potencia', transmissao='$transmissao', kilometros='$kilometros', combustivel='$combustivel', preco='$preco', imagem='$imagem', ano='$ano' WHERE id=$id");

    header("Location: admin.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
<h1 class="dadosLogin">Edite um carro</h1>
<div class="dadosPessoais">
<form method="POST">
    Marca: <input type="text" name="marca" value="<?= $carro['marca'] ?>" required><br>
    Modelo: <input type="text" name="modelo" value="<?= $carro['modelo'] ?>" required><br>
    SubModelo: <input type="text" name="subModelo" value="<?= $carro['subModelo'] ?>" required><br>
    NPortas: <input type="number" name="nPortas" value="<?= $carro['nPortas'] ?>" required><br>
    Potência: <input type="number" name="potencia" value="<?= $carro['potencia'] ?>" required><br>
    Transmissão: <input type="text" name="transmissao" value="<?= $carro['transmissao'] ?>" required><br>
    Quilómetros: <input type="number" name="kilometros" value="<?= $carro['kilometros'] ?>" required><br>
    Combustível: <input type="text" name="combustivel" value="<?= $carro['combustivel'] ?>" required><br>
    Preço: <input type="number" name="preco" value="<?= $carro['preco'] ?>" required><br>
    Imagem: <input type="text" name="imagem" value="<?= $carro['imagem'] ?>" required><br>
    Ano: <input type="number" name="ano" value="<?= $carro['ano'] ?>" required><br>
    <input type="submit" value="Update">
</form>
</div>
</body>
</html>