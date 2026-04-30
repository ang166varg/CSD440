<?php
/*
Angela Vargas
04/28/2026
Module 8 Assignment
Purpose: Query and display all records from the Stephen King books table.
*/

$host = "localhost";
$username = "root";
$password = "Password123!";
$database = "baseball_01";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM angela_king_books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Query Table</title>
</head>
<body>
    <h1>Stephen King Books Table</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>Book ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Publication Year</th>
            <th>Rating</th>
            <th>Read?</th>
        </tr>

        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["book_id"] . "</td>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["genre"] . "</td>";
                echo "<td>" . $row["publication_year"] . "</td>";
                echo "<td>" . $row["rating"] . "</td>";
                echo "<td>" . ($row["is_read"] ? "Yes" : "No") . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>