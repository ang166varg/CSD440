<?php
/*
Angela Vargas
04/28/2026
Module 8 Assignment
Purpose: Create a Stephen King books table in the baseball_01 database.
*/

$host = "localhost";
$username = "root";
$password = "Password123!";
$database = "baseball_01";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE angela_king_books (
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    publication_year INT NOT NULL,
    rating DECIMAL(3,1) NOT NULL,
    is_read BOOLEAN NOT NULL
)";

$message = ($conn->query($sql) === TRUE)
    ? "Table angela_king_books created successfully."
    : "Error creating table: " . $conn->error;

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Table</title>
</head>
<body>
    <h1>Create Table Result</h1>
    <p><?php echo $message; ?></p>
</body>
</html>