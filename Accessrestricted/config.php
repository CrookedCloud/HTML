<?php
// MySQL credentials
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASSWORD", "root");
define("DBDATABASE", "haukai");

$host = DBHOST;
$dbname = DBDATABASE;
$username = DBUSER;
$password = DBPASSWORD;

try {
    // Establish connection to MySQL server without specifying a database initially
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the database exists, and create it if it doesn't
    $stmt = $pdo->query("SHOW DATABASES LIKE '$dbname'");
    if (!$stmt->fetch()) {
        // Create the database if it doesn't exist
        $pdo->exec("CREATE DATABASE $dbname");
    }

    // Select the database for further operations
    $pdo->exec("USE $dbname");

    // Create the 'staff' table if it doesn't exist
    $createTableSQL = "
    CREATE TABLE IF NOT EXISTS staff (
        staffID int unsigned NOT NULL AUTO_INCREMENT,
        firstname varchar(50) NOT NULL,
        lastname varchar(50) NOT NULL,
        email varchar(100) NOT NULL,
        phone varchar(15) NOT NULL,
        PRIMARY KEY (staffID)
    ) AUTO_INCREMENT=1;
    "; $pdo->exec($createTableSQL);

    $checkData = $pdo->query("SELECT COUNT(*) FROM staff");
    if ($checkData->fetchColumn() == 0) {
        $insertDataSQL = "
        INSERT INTO staff (firstname, lastname, email, phone) VALUES
        ('Tessa', 'Stark', 'tessstark@mail.com', 0202223334),
        ('John', 'Farson', 'JohnF@mail.com', 020253734),
        ('Harmony', 'Deans', 'Harmony@mail.com', 020457134),
        ('Alex', 'Hanns', 'Hanns@mail.com', 020457567);
        ";
        $pdo->exec($insertDataSQL);
    }

    // Create the 'reservations' table if it doesn't exist
    $createReservationsTableSQL = "
    CREATE TABLE IF NOT EXISTS reservations (
        reservationID INT UNSIGNED NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        reservation_date DATE NOT NULL,
        reservation_time TIME NOT NULL,
        number_of_guests INT UNSIGNED NOT NULL,
        special_requests TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (reservationID)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    "; $pdo->exec($createReservationsTableSQL);

        // Create the 'roster' table if it doesn't exist
        $createRosterTableSQL = "
        CREATE TABLE IF NOT EXISTS roster (
            rosterID INT UNSIGNED NOT NULL AUTO_INCREMENT,
            weekday VARCHAR(100) NOT NULL,
            date DATE NOT NULL,
            hours TIME NOT NULL,
            staff VARCHAR(200) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (rosterID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        "; $pdo->exec($createRosterTableSQL);

        $checkData = $pdo->query("SELECT COUNT(*) FROM roster");
        if ($checkData->fetchColumn() == 0) {
            $insertDataSQL = "
            INSERT INTO roster (weekday, date, hours, staff) VALUES
            ('Wednesday', '2024-10-02', '17:00:00', 'Tessa / John'),
            ('Thursday', '2024-10-03', '17:00:00', 'Tessa / Harmony'),
            ('Friday', '2024-10-04', '16:00:00', 'Tessa / Harmony'),
            ('Saturday', '2024-10-05', '16:00:00', 'Harmony / John / Alex'),
            ('Sunday', '2024-10-06', '17:00:00', 'John / Alex'),
            ('Wednesday', '2024-10-09', '17:00:00', 'Tessa / John'),
            ('Thursday', '2024-10-10', '17:00:00', 'Tessa / John'),
            ('Friday', '2024-10-11', '16:00:00', 'Tessa / Alex'),
            ('Saturday', '2024-10-12', '16:00:00', 'Harmony / John / Alex'),
            ('Sunday', '2024-10-13', '17:00:00', 'John / Harmony');
            "; $pdo->exec($insertDataSQL);
        }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>