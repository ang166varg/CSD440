<?php
/*
Angela Vargas
05/06/2026
Module 9 Assignment
Purpose: Main index page with links to all PHP files for the database project.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Angela Module 9 Index</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
        }

        .container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 500px;
            margin: auto;
            box-shadow: 0 0 10px gray;
        }

        h1 {
            text-align: center;
            color: darkgreen;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 15px 0;
        }

        a {
            text-decoration: none;
            font-size: 18px;
            color: darkblue;
        }

        a:hover {
            color: green;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Angela Vargas Module 9</h1>

    <ul>
        <li><a href="AngelaCreateTable.php">Create Table</a></li>
        <li><a href="AngelaPopulateTable.php">Populate Table</a></li>
        <li><a href="AngelaQueryTable.php">View All Records</a></li>
        <li><a href="AngelaQuery.php">Search Records</a></li>
        <li><a href="AngelaForm.php">Add New Record</a></li>
        <li><a href="AngelaDropTable.php">Drop Table</a></li>
    </ul>

</div>

</body>
</html>