<?php
/*
Angela Vargas
CSD440 3.2 Programming Assignment
Date: 04/02/2026

Purpose:
This program generates an HTML table filled with random numbers.
Each cell value is calculated by calling a function from an external file.
The function takes two random numbers and returns their sum.
*/

// Include the external PHP file that contains the function
include "sumFunction.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Angela Table 3</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
            font-family: "Times New Roman", serif;
        }
        td {
            border: 1px solid black;
            padding: 15px;
            text-align: center;
            background-color: #dff5e1; /* whimsy green */
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Random Number Sum Table</h2>

<table>
<?php
// Loop to create table rows
for ($rowIndex = 0; $rowIndex < 5; $rowIndex++) {
    echo "<tr>";

    // Loop to create table columns
    for ($columnIndex = 0; $columnIndex < 5; $columnIndex++) {

        // Generate two random numbers between 1 and 50
        $firstRandomNumber = rand(1, 50);
        $secondRandomNumber = rand(1, 50);

        // Call the external function to calculate sum
        $cellValue = calculateSum($firstRandomNumber, $secondRandomNumber);

        // Display result inside table cell
        echo "<td>$cellValue</td>";
    }

    echo "</tr>";
}
?>
</table>

</body>
</html>