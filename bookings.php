<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo "You need to log in to book an appointment.";
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $appointment_date = $_POST['appointment_date'];
    $current_date = date('Y-m-d');

    if ($appointment_date < $current_date) {
        echo "Appointment date cannot be in the past.";
    } else {
        $sql = "INSERT INTO bookings (user_id, appointment_date) VALUES ('$user_id', '$appointment_date')";
        if ($conn->query($sql) === TRUE) {
            echo "Appointment booked successfully.";
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
<style>
body {
    font-family: 'Arial', sans-serif;
    background-image:url(images/image2.jpg);
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

#bookingForm {
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(255, 105, 180, 0.2); 
    max-width: 400px;
    width: 100%;
}

#bookingForm label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    color: #333;
}

#bookingForm input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
}

#bookingForm button {
    width: 100%;
    padding: 10px;
    background-color: #ff69b4; 
    border: none;
    border-radius: 5px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#bookingForm button:hover {
    background-color: #ff85c1; 
}

</style>
<body>
    <?php
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }
    ?>

    <form id="bookingForm" method="post" action="bookings.php" onsubmit="return validateBookingForm()">
        <label for="appointment_date">Choose a date:</label>
        <input type="date" id="appointment_date" name="appointment_date" required>
        <button type="submit">Book Now</button>
    </form>

    <script>
        function validateBookingForm() {
            const appointmentDate = document.getElementById('appointment_date').value;
            const currentDate = new Date().toISOString().split('T')[0];

            if (appointmentDate < currentDate) {
                alert('Appointment date cannot be in the past.');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
