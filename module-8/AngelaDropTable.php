<?php
/*
Angela Vargas
04/28/2026
Module 8 Assignment
Purpose: Drop the Stephen King books table from the baseball_01 database.
*/

$host = "localhost";
$username = "root";
$password = "Password123!";
$database = "baseball_01";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DROP TABLE IF EXISTS angela_king_books";

$message = ($conn->query($sql) === TRUE)
    ? "Table angela_king_books dropped successfully."
    : "Error dropping table: " . $conn->error;

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Drop Table</title>
</head>
<body>
    <h1>Drop Table Result</h1>
    <p><?php echo $message; ?></p>
</body>
</html>