<?php include '../php/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $admin = $_POST['admin'];
    $morada = $_POST['morada'];
    $conn->query("INSERT INTO contas (name, email, admin, morada) VALUES ('$name', '$email','$admin','$morada')");
    header("Location: admin.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Add User</title>
<link rel="stylesheet" href="../CSS/admin.css">
<link rel="stylesheet" href="../CSS/account.css">
</head>
<body>
<h2>Add New User</h2>
<form method="POST">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Admin: <input type="text" name="admin" required><br>
    Morada: <input type="text" name="morada" required><br>
    <button type="submit" class="create-btn">Create</button>
</form>
<a href="admin.html">Back</a>
</body>
</html>