<?php
/*
 * Angela Vargas
 * May 14, 2026
 * Module 10.2 Assignment - JSON Form Program
 * Purpose: Collect user form data and display it in JSON format.
 */

$errorMessage = "";
$jsonOutput = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect and clean form data
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $age = trim($_POST["age"]);
    $favoriteColor = trim($_POST["favoriteColor"]);
    $favoriteFood = trim($_POST["favoriteFood"]);
    $city = trim($_POST["city"]);

    // Check that all fields were completed
    if (
        empty($firstName) || empty($lastName) || empty($email) || empty($phone) ||
        empty($age) || empty($favoriteColor) || empty($favoriteFood) || empty($city)
    ) {
        $errorMessage = "Error: Please complete all fields before submitting the form.";
    } else {

        // Store form data in an associative array
        $formData = [
            "firstName" => $firstName,
            "lastName" => $lastName,
            "email" => $email,
            "phone" => $phone,
            "age" => $age,
            "favoriteColor" => $favoriteColor,
            "favoriteFood" => $favoriteFood,
            "city" => $city
        ];

        // Encode the array into JSON format
        $jsonOutput = json_encode($formData, JSON_PRETTY_PRINT);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Angela JSON Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f6f3;
            margin: 40px;
        }

        .container {
            width: 600px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            border: 2px solid #4f7942;
        }

        h1, h2 {
            color: #355e3b;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 12px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #355e3b;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4f7942;
        }

        .output {
            background-color: #eef5ee;
            border: 1px solid #355e3b;
            padding: 15px;
            margin-top: 20px;
            white-space: pre-wrap;
        }

        .error {
            background-color: #ffe5e5;
            border: 1px solid #b30000;
            color: #b30000;
            padding: 15px;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>JSON Data Form</h1>

    <form method="POST" action="AngelaJSON.php">
        <label>First Name:</label>
        <input type="text" name="firstName">

        <label>Last Name:</label>
        <input type="text" name="lastName">

        <label>Email:</label>
        <input type="email" name="email">

        <label>Phone Number:</label>
        <input type="text" name="phone">

        <label>Age:</label>
        <input type="number" name="age">

        <label>Favorite Color:</label>
        <input type="text" name="favoriteColor">

        <label>Favorite Food:</label>
        <input type="text" name="favoriteFood">

        <label>City:</label>
        <input type="text" name="city">

        <button type="submit">Submit Form</button>
    </form>

    <?php if (!empty($jsonOutput)) { ?>
        <h2>JSON Output</h2>
        <div class="output"><?php echo htmlspecialchars($jsonOutput); ?></div>
    <?php } ?>

    <?php if (!empty($errorMessage)) { ?>
        <div class="error"><?php echo $errorMessage; ?></div>
    <?php } ?>
</div>

</body>
</html>