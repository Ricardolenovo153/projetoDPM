<?php
session_start(); 

require_once 'connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM contas WHERE email = ? OR name = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $username_or_email, $username_or_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['admin'] = (int)$user['admin']; 

                if ($user['admin'] == 1) {
                    header("Location:../admin/choice.php");
                } else {
                    header("Location:../welcome.php");
                }
                exit();
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }

        $stmt->close();
    } else {
        echo "Erro na consulta: " . $conn->error;
    }
}

$conn->close();
?>