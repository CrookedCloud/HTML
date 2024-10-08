<!--BIT607 AS3 Sky Reekie SN:3809237-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Haukai Restaurant</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="
    default-src 'self';
    script-src 'self';
    style-src 'self' https://fonts.googleapis.com 'unsafe-inline';
    font-src 'self' https://fonts.gstatic.com;
    img-src 'self';
    object-src 'none';
    frame-src 'self' https://www.google.com;
    upgrade-insecure-requests;">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href='stylesheet.css' rel='stylesheet'>
</head>

<?php
// Include database config
require_once 'Accessrestricted\config.php';

// Fetch reservation details
$reservationsQuery = $pdo->query("SELECT * FROM reservations");
$reservationDetails = $reservationsQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <header>
        <div class="wrapper">
            <div class="logo">
                <a href="../HTML/index.html">
                    <img src="../HTML/Images,Icons,Videos/IconHaukaiResturant.jpg" alt="The Haukai restaurant icon Logo" height="100" width="240">
                </a>
            </div>

            <nav id="navbar">
                <a href="../HTML/index.html">Home</a>
                <a href="../HTML/menu.html">Dinner Menu</a>
                <a href="../HTML/reservations.html">Reservations</a>
                <a href="../HTML/recipes.html">Recipes</a>
                <a href="../HTML/contact.html">About Us</a>
            </nav>
            <div class="mobile-menu-icon" onclick="toggleMenu()">
                ☰
            </div>
        </div>
    </header>

    <!-- Video Section -->
    <div class="video">
        <video autoplay loop muted>
            <source src="../HTML/Images,Icons,Videos/pohutakawamp4.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Banner Head Section -->
    <div id="BannerHead">
        <h1>THE HAUKAI</h1>
        <h3>Restaurant</h3>
    </div>
    <p class="centered-content">1 Island Street, Kerikeri, Bay of Islands | 09 401 4019</p>



    <!-- Reservation Details Table -->
    <div class="centered-content">
        <h2>Reservation Details</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Time</th>
                <th>Guests</th>
                <th>Special Requests</th>
                <th>Created At</th>
            </tr>
            <?php foreach ($reservationDetails as $reservation): ?>
            <tr>
                <td><?php echo htmlspecialchars($reservation['reservationID']); ?></td>
                <td><?php echo htmlspecialchars($reservation['name']); ?></td>
                <td><?php echo htmlspecialchars($reservation['email']); ?></td>
                <td><?php echo htmlspecialchars($reservation['phone']); ?></td>
                <td><?php echo htmlspecialchars($reservation['reservation_date']); ?></td>
                <td><?php echo htmlspecialchars($reservation['reservation_time']); ?></td>
                <td><?php echo htmlspecialchars($reservation['number_of_guests']); ?></td>
                <td><?php echo htmlspecialchars($reservation['special_requests']); ?></td>
                <td><?php echo htmlspecialchars($reservation['created_at']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
        <hr class="hr-line">

<!-- Page Footer -->
<div class="pagefooter">
    <a href="https://www.facebook.com/">
        <img src="../HTML/Images,Icons,Videos/Facebook-icon.png" alt="Facebook">
    </a>
    <a href="https://www.instagram.com/">
        <img src="../HTML/Images,Icons,Videos/Instagram-icon.png" alt="Instagram">
    </a>
    <a href="https://www.youtube.com/">
        <img src="../HTML/Images,Icons,Videos/youtube-icon.png" alt="YouTube">
    </a>
    <a href="https://x.com/?lang=en-nz">
        <img src="../HTML/Images,Icons,Videos/twitter-icon.png" alt="Twitter">
    </a>
    <br>
    <a href="../HTML/hours.html">Store Hours</a>
    <a href="../HTML/contact.html">Contact Us</a>
    <a href="../HTML/Accessrestricted/staffdashboard.php">Staff Login</a>
    <a href="../HTML/Accessrestricted/admindashboard.php">Admin Login</a>
</div>
</body>
</html>