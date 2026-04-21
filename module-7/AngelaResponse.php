<?php
/*
Angela Vargas
04/21/2026
CSD440 7.2 Assignment

Purpose: Validate submitted form data and display either a formatted response page or error messages.
*/

/*
    Function to clean user input by removing extra spaces
    and converting special characters for safe display.
*/
function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

/*
    Create an array to store validation error messages.
*/
$errorMessages = [];

/*
    Check if the form was submitted using POST.
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect and clean each submitted value
    $fullName = cleanInput($_POST["fullName"] ?? "");
    $emailAddress = cleanInput($_POST["emailAddress"] ?? "");
    $age = cleanInput($_POST["age"] ?? "");
    $birthDate = cleanInput($_POST["birthDate"] ?? "");
    $gender = cleanInput($_POST["gender"] ?? "");
    $favoriteColor = cleanInput($_POST["favoriteColor"] ?? "");
    $comments = cleanInput($_POST["comments"] ?? "");

    /*
        Validate that all seven fields were filled in.
    */
    if (empty($fullName)) {
        $errorMessages[] = "Full Name is required.";
    }

    if (empty($emailAddress)) {
        $errorMessages[] = "Email Address is required.";
    } elseif (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        $errorMessages[] = "Email Address is not valid.";
    }

    if (empty($age)) {
        $errorMessages[] = "Age is required.";
    } elseif (!filter_var($age, FILTER_VALIDATE_INT) || $age < 1 || $age > 120) {
        $errorMessages[] = "Age must be a valid number between 1 and 120.";
    }

    if (empty($birthDate)) {
        $errorMessages[] = "Birth Date is required.";
    }

    if (empty($gender)) {
        $errorMessages[] = "Gender is required.";
    }

    if (empty($favoriteColor)) {
        $errorMessages[] = "Favorite Color is required.";
    }

    if (empty($comments)) {
        $errorMessages[] = "Comments are required.";
    }

} else {
    $errorMessages[] = "Form was not submitted correctly.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angela Response</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            background-color: #f4f8f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 60%;
            margin: 40px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #355e3b;
        }

        .success {
            border-left: 6px solid #6b8e23;
            background-color: #eef6e9;
            padding: 15px;
            margin-top: 20px;
        }

        .error {
            border-left: 6px solid #b22222;
            background-color: #fdeeee;
            padding: 15px;
            margin-top: 20px;
        }

        .data-row {
            margin: 10px 0;
            padding: 8px;
            border-bottom: 1px solid #ccc;
        }

        .label {
            font-weight: bold;
            color: #355e3b;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: #6b8e23;
            padding: 10px 16px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #556b2f;
        }

        ul {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Submission Results</h1>

        <?php if (empty($errorMessages)) : ?>
            <div class="success">
                <p><strong>Your form was submitted successfully.</strong></p>

                <div class="data-row"><span class="label">Full Name:</span> <?php echo $fullName; ?></div>
                <div class="data-row"><span class="label">Email Address:</span> <?php echo $emailAddress; ?></div>
                <div class="data-row"><span class="label">Age:</span> <?php echo $age; ?></div>
                <div class="data-row"><span class="label">Birth Date:</span> <?php echo $birthDate; ?></div>
                <div class="data-row"><span class="label">Gender:</span> <?php echo $gender; ?></div>
                <div class="data-row"><span class="label">Favorite Color:</span> <?php echo $favoriteColor; ?></div>
                <div class="data-row"><span class="label">Comments:</span> <?php echo $comments; ?></div>
            </div>
        <?php else : ?>
            <div class="error">
                <p><strong>The form could not be processed because of the following error(s):</strong></p>
                <ul>
                    <?php
                    // Display each validation error in a list
                    foreach ($errorMessages as $message) {
                        echo "<li>$message</li>";
                    }
                    ?>
                </ul>
            </div>
        <?php endif; ?>

        <a href="AngelaForm.html">Go Back to Form</a>
    </div>
</body>
</html>