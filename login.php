<?php
include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } elseif (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
    } else {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: index.php');
            } else {
                echo "Invalid password";
            }
        } else {
            echo "No user found with that email";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <form id="loginForm" method="post" action="login.php" onsubmit="return validateLoginForm()">
        <input type="email" name="email" id="loginEmail" required placeholder="Email">
        <input type="password" name="password" id="loginPassword" required placeholder="Password">
        <button type="submit">Login</button>
    </form>

    <script>
        function validateLoginForm() {
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }
            if (password.length < 8) {
                alert('Password must be at least 8 characters long.');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
