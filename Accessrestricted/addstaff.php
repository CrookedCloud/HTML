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
    <link href='../stylesheet.css' rel='stylesheet'>
</head>

<?php
// Include database config
require_once 'config.php';
?>

<body>
    <header>
        <div class="wrapper">
            <div class="logo">
                <a href="../index.html">
                    <img src="../Images,Icons,Videos/IconHaukaiResturant.jpg" alt="The Haukai restaurant icon Logo" height="100" width="240">
                </a>
            </div>

            <nav id="navbar">
                <a href="../index.html">Home</a>
                <a href="../menu.html">Dinner Menu</a>
                <a href="../reservations.html">Reservations</a>
                <a href="../recipes.html">Recipes</a>
                <a href="../contact.html">About Us</a>
            </nav>
            <div class="mobile-menu-icon" onclick="toggleMenu()">
                ☰
            </div>
        </div>
    </header>

    <!-- Video Section -->
    <div class="video">
        <video autoplay loop muted>
            <source src="../Images,Icons,Videos/pohutakawamp4.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Banner Head Section -->
    <div id="BannerHead">
        <h1>THE HAUKAI</h1>
        <h3>Restaurant</h3>
    </div>
    <p class="centered-content">1 Island Street, Kerikeri, Bay of Islands | 09 401 4019</p>

    <div class="centered-content">
        <h1>Add New Staff</h1>
        <form method="POST" action="addstaff.php">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required><br><br>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required><br><br>

            <input type="submit" value="Add Staff">
        </form>
    </div>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Insert new staff member into the database
    $stmt = $pdo->prepare("INSERT INTO staff (firstname, lastname, email, phone) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phone']]);

    // Redirect back to the admin dashboard after successful addition
    header('Location: admindashboard.php');
}
?>


<!-- Page Footer -->
<div class="pagefooter">
        <a href="https://www.facebook.com/">
            <img src="../Images,Icons,Videos/Facebook-icon.png" alt="Facebook">
        </a>
        <a href="https://www.instagram.com/">
            <img src="../Images,Icons,Videos/Instagram-icon.png" alt="Instagram">
        </a>
        <a href="https://www.youtube.com/">
            <img src="../Images,Icons,Videos/youtube-icon.png" alt="YouTube">
        </a>
        <a href="https://x.com/?lang=en-nz">
            <img src="../Images,Icons,Videos/twitter-icon.png" alt="Twitter">
        </a>
        <br>
        <a href="../hours.html">Store Hours</a>
        <a href="../contact.html">Contact Us</a>
        <a href="../Accessrestricted/staffdashboard.php">Staff Login</a>
        <a href="../Accessrestricted/admindashboard.php">Admin Login</a>
    </div>
</body>
</html>