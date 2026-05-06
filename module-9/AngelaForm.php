<?php
/*
Angela Vargas
05/06/2026
Module 9 Assignment
Purpose: Add a new Stephen King book record into the database.
*/

$host = "localhost";
$username = "root";
$password = "Password123!";
$database = "baseball_01";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $year = $_POST['publication_year'];
    $rating = $_POST['rating'];
    $is_read = $_POST['is_read'];

    $stmt = $conn->prepare("INSERT INTO angela_king_books 
    (title, genre, publication_year, rating, is_read)
    VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("ssidi", $title, $genre, $year, $rating, $is_read);

    if ($stmt->execute()) {
        $message = "Record added successfully!";
    } else {
        $message = "Error adding record.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book Record</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
            padding: 30px;
        }

        .container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 500px;
            margin: auto;
        }

        h1 {
            color: darkgreen;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px 15px;
        }
    </style>
</head>

<body>

<div class="container">

<h1>Add New Book</h1>

<form method="POST">

    <label>Book Title</label>
    <input type="text" name="title" required>

    <label>Genre</label>
    <input type="text" name="genre" required>

    <label>Publication Year</label>
    <input type="number" name="publication_year" required>

    <label>Rating</label>
    <input type="number" step="0.1" name="rating" required>

    <label>Read? (1 = Yes, 0 = No)</label>
    <input type="number" name="is_read" required>

    <button type="submit">Add Record</button>

</form>

<p><?php echo $message; ?></p>

</div>

</body>
</html>