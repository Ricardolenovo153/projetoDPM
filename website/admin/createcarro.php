<?php include '../php/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
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
    $conn->query("INSERT INTO carro (marca, modelo, subModelo, nPortas, potencia, transmissao, kilometros, combustivel, preco, imagem, ano) VALUES ('$marca','$modelo','$subModelo','$nPortas','$potencia','$transmissao','$kilometros','$combustivel','$preco','$imagem','$ano')");
    header("Location: admin.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Car</title>
<link rel="stylesheet" href="../CSS/admin.css">
<link rel="stylesheet" href="../CSS/account.css">
</head>
<body>
<h2>Add New Car</h2>
<form method="POST">
    Marca: <input type="text" name="marca" required><br>
    Modelo: <input type="text" name="modelo" required><br>
    SubModelo: <input type="text" name="subModelo" required><br>
    NPortas: <input type="number" name="nPortas" required><br>
    Potencia: <input type="number" name="potencia" required><br>
    Transmissao: <input type="text" name="transmissao" required><br>
    Kilometros: <input type="number" name="kilometros" required><br>
    Combustivel: <input type="text" name="combustivel" required><br>
    Preco: <input type="number" name="preco" required><br>
    Imagem: <input type="text" name="imagem" required><br>
    Ano: <input type="number" name="ano" required><br>
    <button type="submit" class="create-btn">Create</button>
</form>
<a href="admin.html">Back</a>
</body>
</html>