<?php
/*
Angela Vargas
04/28/2026
Module 8 Assignment
Purpose: Populate the Stephen King books table with sample records.
*/

$host = "localhost";
$username = "root";
$password = "Password123!";
$database = "baseball_01";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO angela_king_books 
(title, genre, publication_year, rating, is_read) VALUES
('The Shining', 'Horror', 1977, 9.5, TRUE),
('It', 'Horror', 1986, 9.8, TRUE),
('Carrie', 'Horror', 1974, 8.7, TRUE),
('Misery', 'Thriller', 1987, 9.2, FALSE),
('The Stand', 'Post-Apocalyptic', 1978, 9.6, FALSE)";

$message = ($conn->query($sql) === TRUE)
    ? "Records added successfully to angela_king_books."
    : "Error adding records: " . $conn->error;

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Populate Table</title>
</head>
<body>
    <h1>Populate Table Result</h1>
    <p><?php echo $message; ?></p>
</body>
</html>