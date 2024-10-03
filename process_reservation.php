<?php
// Include the database configuration file
include 'Accessrestricted\config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $reservation_date = $_POST['date'] ?? '';
    $reservation_time = $_POST['time'] ?? '';
    $number_of_guests = $_POST['guests'] ?? 0;
    $special_requests = $_POST['specialRequests'] ?? '';

    // Prepare the SQL statement
    $stmt = $pdo->prepare("INSERT INTO reservations (name, email, phone, reservation_date, reservation_time, number_of_guests, special_requests) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    // Execute the statement with form data
    if ($stmt->execute([$name, $email, $phone, $reservation_date, $reservation_time, $number_of_guests, $special_requests])) {
        header("Location: ../HTML/reservationsuccess.html");
        exit();
    } else {
        echo "Error making reservation: " . $stmt->errorInfo()[2];
    }
}
?>