<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (strlen($username) < 3) {
        echo "Username must be at least 3 characters long.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } elseif (strlen($password) < 6) {
        echo "Password must be at least 6 characters long.";
    } else {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$passwordHash')";
        if ($conn->query($sql) === TRUE) {
            header('Location: login.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
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
    <form id="signupForm" method="post" action="signup.php" onsubmit="return validateSignupForm()">
        <input type="text" name="username" id="username" required placeholder="Username">
        <input type="email" name="email" id="email" required placeholder="Email">
        <input type="password" name="password" id="password" required placeholder="Password">
        <button type="submit">Sign Up</button>
    </form>

    <script>
        function validateSignupForm() {
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (username.length < 3) {
                alert('Username must be at least 3 characters long.');
                return false;
            }
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
