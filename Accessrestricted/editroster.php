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

<?php
// Include database config
require_once 'config.php';

// Check if the rosterID is set
if (isset($_GET['id'])) {
    $rosterID = intval($_GET['id']);

    // Fetch the current roster entry
    $stmt = $pdo->prepare("SELECT * FROM roster WHERE rosterID = :rosterID");
    $stmt->execute(['rosterID' => $rosterID]);
    $roster = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if roster entry exists
    if (!$roster) {
        die("Roster entry not found.");
    }

    // Process form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the posted values
        $weekday = $_POST['weekday'];
        $date = $_POST['date'];
        $hours = $_POST['hours'];
        $staff = $_POST['staff'];

        // Update the roster entry
        $updateStmt = $pdo->prepare("
            UPDATE roster SET 
            weekday = :weekday, 
            date = :date, 
            hours = :hours, 
            staff = :staff 
            WHERE rosterID = :rosterID
        ");
        
        $updateStmt->execute([
            'weekday' => $weekday,
            'date' => $date,
            'hours' => $hours,
            'staff' => $staff,
            'rosterID' => $rosterID,
        ]);

        // Redirect to the roster management page after updating
        header('Location: staffdashboard.php');
        exit;
    }
} else {
    die("Invalid request.");
}
?>
    <div class="centered-content">
        <h2>Roster Management</h2>
        <form method="POST" action="">
            <label for="weekday">Weekday:</label>
            <input type="text" id="weekday" name="weekday" value="<?php echo htmlspecialchars($roster['weekday']); ?>" required><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($roster['date']); ?>" required><br>

            <label for="hours">Hours:</label>
            <input type="time" id="hours" name="hours" value="<?php echo htmlspecialchars($roster['hours']); ?>" required><br>

            <label for="staff">Staff:</label>
            <input type="text" id="staff" name="staff" value="<?php echo htmlspecialchars($roster['staff']); ?>" required><br>

            <input type="submit" value="Update Roster">
        </form>
        <br>
        <a href="admindashboard.php">Roster Management</a>
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