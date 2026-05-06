<?php
/*
Angela Vargas
05/06/2026
Module 9 Assignment
Purpose: Search for Stephen King books by title.
*/

$host = "localhost";
$username = "root";
$password = "Password123!";
$database = "baseball_01";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchResult = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];

    $stmt = $conn->prepare("SELECT * FROM angela_king_books WHERE title LIKE ?");
    $searchTerm = "%" . $title . "%";

    $stmt->bind_param("s", $searchTerm);

    $stmt->execute();

    $result = $stmt->get_result();

    $searchResult = $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Books</title>

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
            width: 700px;
            margin: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        h1 {
            color: darkgreen;
        }
    </style>
</head>

<body>

<div class="container">

<h1>Search Stephen King Books</h1>

<form method="POST">

    <label>Enter Book Title:</label><br><br>

    <input type="text" name="title" required>

    <button type="submit">Search</button>

</form>

<?php
if ($searchResult && $searchResult->num_rows > 0) {

    echo "<table>";

    echo "<tr>
            <th>ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Rating</th>
          </tr>";

    while ($row = $searchResult->fetch_assoc()) {

        echo "<tr>";

        echo "<td>" . $row['book_id'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
        echo "<td>" . $row['publication_year'] . "</td>";
        echo "<td>" . $row['rating'] . "</td>";

        echo "</tr>";
    }

    echo "</table>";

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<p>No matching books found.</p>";
}

$conn->close();
?>

</div>

</body>
</html>