<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Salon</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="About us.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="bookings.php">Booking</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php 
                if (isset($_SESSION['user_id'])): 
                ?>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                <?php 
            else:
             ?>
                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a></li>
                <?php 
            endif; 
            ?>
            </ul>
        </div>
    </nav>

    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/image1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Welcome to Our Penguins Salon</h3>
                        <p>Welcome to Penguin's Salon in Mombasa, where we offer exceptional grooming services in a relaxing atmosphere.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/image2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Professional Services</h3>
                        <p>Experience top-notch haircuts, styling, and treatments at Penguin's Salon, tailored to enhance your unique beauty.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/image3.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Book Your Appointment</h3>
                        <p>Book your appointment at Penguin's Salon today for a personalized experience that transforms your look!</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>About Us</h2>
                <p>Welcome to Penguin's Salon, Mombasa's premier destination for exceptional grooming services. Our professional team offers tailored haircuts, styling, and treatments in a 
                    elaxing atmosphere. Book your appointment today for a transformative experience.</p>
            </div>

            <div class="col-md-6">
                <h2>Book an Appointment with Us</h2>
                <?php 
                if (isset($_SESSION['user_id'])): ?>
                    <form method="post" action="bookings.php">
                        <div class="form-group">
                            <label for="appointment_date">Choose a date:</label>
                            <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Book Now</button>
                    </form>

                <?php 
            else: ?>
                    <p>Please <a href="#" data-toggle="modal" data-target="#loginModal">login</a> to book an appointment.</p>
                <?php endif; ?>
            </div>
        </div>
         <h2>Some of our esteemed customers and services</h2>
        <div class="row mt-5">
            <div class="col-md-3">
                <img src="images/service1.jpg" class="img-fluid" alt="Service 1">
            </div>
            <div class="col-md-3">
                <img src="images/service2.jpg" class="img-fluid" alt="Service 2">
            </div>
            <div class="col-md-3">
                <img src="images/service3.jpg" class="img-fluid" alt="Service 3">
            </div>
            <div class="col-md-3">
                <img src="images/service4.jpg" class="img-fluid" alt="Service 4">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <img src="images/service5.jpg" class="img-fluid" alt="Service 5">
                
            </div>
            <div class="col-md-3">
                <img src="images/service6.jpg" class="img-fluid" alt="Service 6">
            </div>
            <div class="col-md-3">
                <img src="images/service7.jpg" class="img-fluid" alt="Service 7">
            </div>
            <div class="col-md-3">
                <img src="images/service8.jpg" class="img-fluid" alt="Service 8">
                We do body piercing and tatooing.
            </div>
        </div>
    </div>

    <footer class="bg-light mt-5 p-4">
        <div class="row">
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p>123 Salon Mombasa-Kenya</p>
                <p>Email: info@salon.com</p>
                <p>Phone: +254 7456 78900</p>
            </div>
            <div class="col-md-4">
                <h5>Follow Us</h5>
                <p>
                    <a href="#"><i class="fab fa-facebook"></i>    Facebook</a><br><br>
                    <a href="#"><i class="fab fa-twitter"></i>    Twitter</a><br><br>
                    <a href="#"><i class="fab fa-instagram"></i>    Instagram</a>
                </p>
            </div>
            <div class="col-md-4">
                <h5>Opening Hours</h5>
                <p>Monday - Friday: 7:00am - 9:00pm</p>
                <p>Sarturday: 7:00am - 5:00pm</p>
                <p>Sunday: Closed</p>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
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

    <!-- Signup Modal -->
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
</body>
</html>
