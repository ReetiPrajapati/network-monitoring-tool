<?php
$servername = "localhost";
$username = "reeti27";  // Replace with your database username
$password = "18552027";  // New user's password
$dbname = "user_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $stmt->bind_result($storedPassword);
    $stmt->fetch();

    if ($storedPassword && $inputPassword == $storedPassword) {
        // Login successful, redirect to packet_info.php
        header("Location: packet_info.html");
        exit(); // Ensure that no other code is executed after redirection
    } else {
        echo "<p class='error'>Invalid username or password.</p>";
    }

    $stmt->close();
}

$conn->close();
?>

