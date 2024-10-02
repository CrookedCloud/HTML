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
<body>
    <header>
        <div class="wrapper">
            <div class="logo">
                <a href="../HTML/index.html">
                    <img src="../Images,Icons,Videos/IconHaukaiResturant.jpg" alt="The Haukai restaurant icon Logo" height="100" width="240">
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
            <source src="../Images,Icons,Videos/pohutakawamp4.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Banner Head Section -->
    <div id="BannerHead">
        <h1>THE HAUKAI</h1>
        <h3>Restaurant</h3>
    </div>

<?php
// Include database configuration
require_once 'config.php';

// Initialize staff variable
$staff = [];

// Fetch staff data for editing if 'id' is set in the GET request
if (isset($_GET['id'])) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM staff WHERE staffID = :id");
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        $staff = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error fetching staff data: " . $e->getMessage();
    }
}
?>
    <div class="centered-content">
        <h1>Edit Staff</h1>
        <form method="POST" action="editstaff.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($staff['firstname'] ?? ''); ?>" required><br><br>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($staff['lastname'] ?? ''); ?>" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($staff['email'] ?? ''); ?>" required><br><br>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($staff['phone'] ?? ''); ?>" required><br><br>

            <input type="submit" value="Update Staff">
        </form>
    </div>

    <?php
    // Update staff details if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $stmt = $pdo->prepare("UPDATE staff SET firstname = ?, lastname = ?, email = ?, phone = ? WHERE staffID = ?");
            $stmt->execute([
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['phone'],
                $_GET['id']
            ]);

            // Redirect back to the admin dashboard after successful update
            header('Location: admindashboard.php');
            exit(); // Ensure script execution stops after the redirect
        } catch (PDOException $e) {
            echo "Error updating staff details: " . $e->getMessage();
        }
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
        <a href="../HTML/hours.html">Store Hours</a>
        <a href="../HTML/contact.html">Contact Us</a>
        <a href="../Accessrestricted/staffdashboard.php">Staff Login</a>
        <a href="../Accessrestricted/admindashboard.php">Admin Login</a>
    </div>
</body>
</html>