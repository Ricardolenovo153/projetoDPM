<?php include '../php/connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD App</title>
    <link rel="stylesheet" href="../CSS/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<h2>Users List</h2>
<a class="botao" href="createuser.php"><i class="fa-solid fa-plus"></i> Add New User</a>
<table>
    <tr><th>ID</th><th>Admin</th><th>Name</th><th>Email</th><th>Morada</th><th>Actions</th></tr>
    <?php
    $result = $conn->query("SELECT * FROM contas");
    while ($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['admin'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['morada'] ?></td>
        <td>
            <a href="edituser.php?id=<?= $row['id'] ?>">✏️</a> |
            <a href="deleteuser.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑️</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>