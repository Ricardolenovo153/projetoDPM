<?php include '../php/connection.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM contas WHERE id=$id");
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $admin = $_POST['admin'];
    $morada = $_POST['morada'];
    $conn->query("UPDATE contas SET name='$name', email='$email', admin='$admin', morada='$morada' WHERE id=$id");
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
<h1 class="dadosLogin">Edite uma conta</h1>
<div class="dadosPessoais">
<form method="POST">
    Name: <input type="text" name="name" value="<?= $user['name'] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $user['email'] ?>" required><br>
    Admin: <input type="text" name="admin" value="<?= $user['admin'] ?>" required><br>
    Morada: <input type="text" name="morada" value="<?= $user['morada'] ?>" required><br>
    <input type="submit" value="Update">
</form>
</div>
</body>
</html>