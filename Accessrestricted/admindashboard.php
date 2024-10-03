<!--BIT607 AS3 Sky Reekie SN:3809237-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Haukai Restaurant</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'; style-src 'self' https://fonts.googleapis.com 'unsafe-inline'; font-src 'self' https://fonts.gstatic.com; img-src 'self'; object-src 'none'; frame-src 'self' https://www.google.com; upgrade-insecure-requests;">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href='../stylesheet.css' rel='stylesheet'>
</head>

<?php
// Include database config
require_once 'config.php';

// Fetch staff details
$staffQuery = $pdo->query("SELECT * FROM staff");
$staffDetails = $staffQuery->fetchAll(PDO::FETCH_ASSOC);

// Fetch roster details
$rosterQuery = $pdo->query("SELECT * FROM roster");
$rosterDetails = $rosterQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!--Nav bar-->
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

    <!--Display links-->
    <div class="centered-links">
    <a href="../displayreservations.php">Veiw Reservations</a>
    <a href="../Accessrestricted/staffdashboard.php">Staff Dashboard</a>
    <a href="addstaff.php">Add New Staff</a><br>
    </div>

    <!-- Staff Table -->
    <div class="centered-content">
        <h2>Staff Management</h2>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch staff details
                foreach ($staffDetails as $staff) {
                    echo "<tr>";
                    echo "<td>{$staff['firstname']}</td>";
                    echo "<td>{$staff['lastname']}</td>";
                    echo "<td>{$staff['email']}</td>";
                    echo "<td>{$staff['phone']}</td>";
                    echo "<td><a href='editstaff.php?id={$staff['staffID']}'>Edit</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>




    <!-- Roster Table -->
    <div class="centered-content">
        <h2>Roster Management</h2>         
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Weekday</th>
                    <th>Date</th>
                    <th>Hours</th>
                    <th>Staff</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch roster details
                foreach ($rosterDetails as $roster) {
                    echo "<tr>";
                    echo "<td>{$roster['weekday']}</td>";
                    echo "<td>{$roster['date']}</td>";
                    echo "<td>{$roster['hours']}</td>";
                    echo "<td>{$roster['staff']}</td>";
                    echo "<td><a href='editroster.php?id={$roster['rosterID']}'>Edit</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <hr class="hr-line">


    <!-- Page Footer -->
    <div class="pagefooter">
        <a href="https://www.facebook.com/">
            <img src="../Images,Icons,Videos/Facebook-icon.png" alt="Facebook" />
        </a>
        <a href="https://www.instagram.com/">
            <img src="../Images,Icons,Videos/Instagram-icon.png" alt="Instagram" />
        </a>
        <a href="https://www.youtube.com/">
            <img src="../Images,Icons,Videos/youtube-icon.png" alt="YouTube" />
        </a>
        <a href="https://x.com/?lang=en-nz">
            <img src="../Images,Icons,Videos/twitter-icon.png" alt="Twitter" />
        </a>
        <br>
        <a href="../hours.html">Store Hours</a>
        <a href="../contact.html">Contact Us</a>
        <a href="../Accessrestricted/staffdashboard.php">Staff Login</a>
        <a href="../Accessrestricted/admindashboard.php">Admin Login</a>
    </div>
</body>
</html>
