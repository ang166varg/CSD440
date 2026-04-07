<?php
/*
Angela Vargas
CSD440
4.2 Programming Assignment
Date: April 7, 2026

Purpose: This program checks whether a string is a palindrome by comparing it to its reverse.
*/

// Function to check if a string is a palindrome
function isPalindrome($inputString) {
    // Convert string to lowercase and remove spaces for accurate comparison
    $cleanedString = strtolower(str_replace(' ', '', $inputString));

    // Reverse the cleaned string
    $reversedString = strrev($cleanedString);

    // Compare original and reversed string
    if ($cleanedString === $reversedString) {
        return true;
    } else {
        return false;
    }
}

// Function to display results
function displayResult($testString) {
    $reversed = strrev($testString);

    echo "<tr>";
    echo "<td>$testString</td>";
    echo "<td>$reversed</td>";

    if (isPalindrome($testString)) {
        echo "<td>Palindrome</td>";
    } else {
        echo "<td>Not a Palindrome</td>";
    }

    echo "</tr>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Palindrome Checker</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            background-color: #f4f7f4;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 30px auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #6b8e6b; /* whimsy green */
            color: white;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Palindrome Test Results</h1>

<table>
    <tr>
        <th>Original String</th>
        <th>Reversed String</th>
        <th>Result</th>
    </tr>

    <?php
    // Three palindrome examples
    displayResult("racecar");
    displayResult("madam");
    displayResult("level");

    // Three non-palindrome examples
    displayResult("hello");
    displayResult("world");
    displayResult("php");
    ?>

</table>

</body>
</html>