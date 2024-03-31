<?php
// Database connection parameters
$servername = "localhost";
$usernameDB = "root"; // Default username for XAMPP
$passwordDB = ""; // Default password for XAMPP
$database = "login"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $usernameDB, $passwordDB, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['psw'];

// Sanitize input (prevent SQL injection)
$username = $conn->real_escape_string($username);
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert data into database
$sql = "INSERT INTO credentials (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    // Redirect to index.html
    header("Location: index.html");
    exit; // Ensure script stops executing after redirect
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
