<?php
/*
Angela Vargas
CSD440 6.2 Programming Assignment
April 14, 2026

Purpose: Define a class that stores an integer and tests whether it is even, odd, or prime.
*/

/**
 * Class AngelaMyInteger
 * Stores one integer value and provides methods to test it.
 */
class AngelaMyInteger
{
    /**
     * Private property to store the integer value.
     */
    private int $number;

    /**
     * Constructor method that sets the integer value.
     *
     * @param int $number The integer passed when creating the object.
     */
    public function __construct(int $number)
    {
        $this->number = $number;
    }

    /**
     * Getter method to return the current number.
     *
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * Setter method to update the current number.
     *
     * @param int $number The new integer value.
     * @return void
     */
    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    /**
     * Checks whether a number is even.
     *
     * @param int $value The number to test.
     * @return bool
     */
    public function isEven(int $value): bool
    {
        return $value % 2 === 0;
    }

    /**
     * Checks whether a number is odd.
     *
     * @param int $value The number to test.
     * @return bool
     */
    public function isOdd(int $value): bool
    {
        return $value % 2 !== 0;
    }

    /**
     * Checks whether the stored number is prime.
     *
     * @return bool
     */
    public function isPrime(): bool
    {
        // Numbers less than 2 are not prime
        if ($this->number < 2) {
            return false;
        }

        // Check for factors from 2 up to the square root of the number
        for ($divisor = 2; $divisor <= sqrt($this->number); $divisor++) {
            if ($this->number % $divisor === 0) {
                return false;
            }
        }

        return true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angela MyInteger</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            background-color: #f4f8f2;
            color: #2f3e2f;
            margin: 30px;
        }

        h1, h2 {
            color: #3f5f3f;
        }

        .result-box {
            background-color: #ffffff;
            border: 1px solid #8aa07b;
            padding: 15px;
            margin-bottom: 20px;
        }

        ul {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h1>Angela MyInteger Class Test</h1>
    <p>This program creates a class named AngelaMyInteger, stores an integer, and tests whether numbers are even, odd, or prime.</p>

    <?php
    // Create two instances of the AngelaMyInteger class
    $firstInteger = new AngelaMyInteger(11);
    $secondInteger = new AngelaMyInteger(20);

    // Display results for the first object
    echo "<div class='result-box'>";
    echo "<h2>First Instance</h2>";
    echo "<ul>";
    echo "<li>Stored Number: " . $firstInteger->getNumber() . "</li>";
    echo "<li>Is 3 even? " . ($firstInteger->isEven(3) ? "Yes" : "No") . "</li>";
    echo "<li>Is 3 odd? " . ($firstInteger->isOdd(3) ? "Yes" : "No") . "</li>";
    echo "<li>Is stored number prime? " . ($firstInteger->isPrime() ? "Yes" : "No") . "</li>";
    echo "</ul>";
    echo "</div>";

    // Display results for the second object
    echo "<div class='result-box'>";
    echo "<h2>Second Instance</h2>";
    echo "<ul>";
    echo "<li>Stored Number: " . $secondInteger->getNumber() . "</li>";
    echo "<li>Is 4 even? " . ($secondInteger->isEven(4) ? "Yes" : "No") . "</li>";
    echo "<li>Is 4 odd? " . ($secondInteger->isOdd(4) ? "Yes" : "No") . "</li>";
    echo "<li>Is stored number prime? " . ($secondInteger->isPrime() ? "Yes" : "No") . "</li>";
    echo "</ul>";
    echo "</div>";

    // Test the setter method by changing the second object's value
    $secondInteger->setNumber(13);

    // Display updated results after using the setter
    echo "<div class='result-box'>";
    echo "<h2>Second Instance After Setter Test</h2>";
    echo "<ul>";
    echo "<li>Updated Stored Number: " . $secondInteger->getNumber() . "</li>";
    echo "<li>Is 17 even? " . ($secondInteger->isEven(17) ? "Yes" : "No") . "</li>";
    echo "<li>Is 17 odd? " . ($secondInteger->isOdd(17) ? "Yes" : "No") . "</li>";
    echo "<li>Is updated stored number prime? " . ($secondInteger->isPrime() ? "Yes" : "No") . "</li>";
    echo "</ul>";
    echo "</div>";
    ?>

</body>
</html>