<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AngelaTable2.php</title>

	<style>
    body {
        font-family: "Times New Roman", Times, serif;
        background-color: #f4f4f4;
        margin: 30px;
        text-align: center;
    }

    h1 {
        color: #333333;
    }

    table {
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #ffffff;
    }

    th, td {
        border: 1px solid #333333;
        padding: 12px;
        width: 60px;
        height: 45px;
        text-align: center;
    }

    /* Whimsy green header */
    th {
        background-color: #cfe8cf;  /* soft whimsical green */
        color: #2f4f2f;
    }

    td {
        background-color: #fafafa;
    }
	</style>
</head>
<body>

    <h1>PHP Random Number Table</h1>
    <p>This table displays PHP-generated random numbers using a nested loop structure.</p>

    <?php
    /*
        Angela Vargas CSD440 2.2 Programming Assignment

        Purpose:
        This program creates an HTML table using a PHP nested loop structure.
        The table displays random numbers in a two-dimensional format, with
        each cell containing a PHP-generated random number. The goal of this
        assignment is to demonstrate the use of nested loops, random number
        generation, and proper separation of HTML and PHP code.
    */


    // Define the number of rows and columns for the table.
    $numberOfRows = 5;
    $numberOfColumns = 5;
    ?>

    <table>
        <tr>
            <th>Col 1</th>
            <th>Col 2</th>
            <th>Col 3</th>
            <th>Col 4</th>
            <th>Col 5</th>
        </tr>

        <?php
        // Outer loop controls the number of table rows.
        for ($currentRow = 1; $currentRow <= $numberOfRows; $currentRow++) {
        ?>
            <tr>
                <?php
                // Inner loop controls the number of columns in each row.
                for ($currentColumn = 1; $currentColumn <= $numberOfColumns; $currentColumn++) {

                    // Generate a random number between 1 and 100 for each cell.
                    $randomNumber = rand(1, 100);
                ?>
                    <td><?php echo $randomNumber; ?></td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </table>

</body>
</html>