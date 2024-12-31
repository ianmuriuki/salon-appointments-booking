<?php
session_start();
include("connection.php");
 
$nameError = $emailError = $messageError = '';
$name = $email = $message = '';
$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST['name'])) {
        $nameError = 'Name is required';
    } 
    else
     {
        $name = trim($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $emailError = 'Email is required';
    } 
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Invalid email format';
    } 
    else {
        $email = trim($_POST['email']);
    }

    if (empty($_POST['message'])) {
        $messageError = 'Message is required';
    } else
     {
        $message = trim($_POST['message']);
    }

    
    if (empty($nameError) && empty($emailError) && empty($messageError)) {
    
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo 'Message sent successfully!';
            
            $name = $email = $message = '';
        } else {
            $successMessage = 'Error: ' . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penguin Salons</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head>
<style>
    body{
        background-image: url(images/image4.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Penguin Salon</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="booking.php">Booking</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <div class="row">
        
            <div class="col-md-6 mb-4">
                <h2>About Us</h2>
                <p>Welcome to Penguin Salon, where we offer exceptional beauty services 
                    tailored to your needs. Our experienced team is dedicated to making you look and feel your 
                    best. Visit us and experience our top-notch services in a relaxing environment.</p>
            </div>

            
            <div class="col-md-6 mb-4">
                <h2>Contact Us</h2>
                <form id="contactForm" method="post" action="contact.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>


    <footer class="bg-light mt-5 p-4">
        <div class="row">
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p>123 Salon St, Beauty City, Country</p>
                <p>Email: info@penguinsalon.com</p>
                <p>Phone: +254 7456 78900</p>
            </div>
            <div class="col-md-4">
                <h5>Follow Us</h5>
                <p>
                    <a href="#"><i class="fab fa-facebook">   Facebook</i></a><br><br>
                    <a href="#"><i class="fab fa-twitter">   Twitter</i></a><br><br>
                    <a href="#"><i class="fab fa-instagram">  Instagram</i></a>
                </p>
            </div>
            <div class="col-md-4">
                <h5>Opening Hours</h5>
                <p>Monday - Friday: 9am - 7pm</p>
                <p>Sarturday: 9am - 5pm</p>
                <p>Sunday: Closed</p>
            </div>
        </div>
    </footer>

    
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="login.php">
                        <div class="form-group">
                            <label for="loginEmail">Email</label>
                            <input type="email" class="form-control" id="loginEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="signup.php">
                        <div class="form-group">
                            <label for="signupUsername">Username</label>
                            <input type="text" class="form-control" id="signupUsername" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="signupEmail">Email</label>
                            <input type="email" class="form-control" id="signupEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="signupPassword">Password</label>
                            <input type="password" class="form-control" id="signupPassword" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#contactForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true,
                        minlength: 10
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name",
                        minlength: "Your name must consist of at least 2 characters"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    message: {
                        required: "Please enter your message",
                    }
                }
            });
        });
    </script>
</body>
</html>
