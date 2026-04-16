<?php
/*
Angela Vargas
CSD440 5.2 Programming Assignment
April 16, 2026

Purpose: Create and display an array of customers (modern pop singers) and use array methods to find records by different data fields.
*/

/**
 * Returns the full name of a customer.
 */
function getFullName(array $customer): string
{
    return $customer['first_name'] . ' ' . $customer['last_name'];
}

/**
 * Displays all customers in a table.
 */
function displayCustomersTable(array $customers): void
{
    echo "<table>";
    echo "<tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Phone Number</th>
          </tr>";

    foreach ($customers as $customer) {
        echo "<tr>";
        echo "<td>{$customer['first_name']}</td>";
        echo "<td>{$customer['last_name']}</td>";
        echo "<td>{$customer['age']}</td>";
        echo "<td>{$customer['phone_number']}</td>";
        echo "</tr>";
    }

    echo "</table>";
}

/**
 * Find by first name
 */
function findCustomersByFirstName(array $customers, string $firstName): array
{
    return array_filter($customers, function ($customer) use ($firstName) {
        return strtolower($customer['first_name']) === strtolower($firstName);
    });
}

/**
 * Find by last name
 */
function findCustomersByLastName(array $customers, string $lastName): array
{
    return array_filter($customers, function ($customer) use ($lastName) {
        return strtolower($customer['last_name']) === strtolower($lastName);
    });
}

/**
 * Find by age
 */
function findCustomersByAge(array $customers, int $age): array
{
    return array_filter($customers, function ($customer) use ($age) {
        return $customer['age'] === $age;
    });
}

/**
 * Find by phone number
 */
function findCustomersByPhoneNumber(array $customers, string $phoneNumber): array
{
    return array_filter($customers, function ($customer) use ($phoneNumber) {
        return $customer['phone_number'] === $phoneNumber;
    });
}

/**
 * Display search results
 */
function displaySearchResults(string $title, array $results): void
{
    echo "<h2>$title</h2>";

    if (!empty($results)) {
        echo "<ul>";
        foreach ($results as $customer) {
            echo "<li>" . getFullName($customer) .
                 " | Age: {$customer['age']}" .
                 " | Phone: {$customer['phone_number']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No results found.</p>";
    }
}

/* Pop singer "customers" */
$customers = [
    ['first_name' => 'Taylor', 'last_name' => 'Swift', 'age' => 34, 'phone_number' => '303-555-2001'],
    ['first_name' => 'Ariana', 'last_name' => 'Grande', 'age' => 30, 'phone_number' => '303-555-2002'],
    ['first_name' => 'Billie', 'last_name' => 'Eilish', 'age' => 22, 'phone_number' => '303-555-2003'],
    ['first_name' => 'Dua', 'last_name' => 'Lipa', 'age' => 28, 'phone_number' => '303-555-2004'],
    ['first_name' => 'Selena', 'last_name' => 'Gomez', 'age' => 31, 'phone_number' => '303-555-2005'],
    ['first_name' => 'Harry', 'last_name' => 'Styles', 'age' => 30, 'phone_number' => '303-555-2006'],
    ['first_name' => 'Olivia', 'last_name' => 'Rodrigo', 'age' => 21, 'phone_number' => '303-555-2007'],
    ['first_name' => 'Justin', 'last_name' => 'Bieber', 'age' => 30, 'phone_number' => '303-555-2008'],
    ['first_name' => 'The', 'last_name' => 'Weeknd', 'age' => 34, 'phone_number' => '303-555-2009'],
    ['first_name' => 'Lady', 'last_name' => 'Gaga', 'age' => 38, 'phone_number' => '303-555-2010']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Angela Customers</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            background-color: #f5f8f2;
            margin: 30px;
        }
        h1, h2 {
            color: #3f5f3f;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #7a8f6a;
            padding: 10px;
        }
        th {
            background-color: #b9d1a7;
        }
        tr:nth-child(even) {
            background-color: #eef5e8;
        }
    </style>
</head>
<body>

<h1>Customer Records (Pop Singers)</h1>

<?php
// Display full table
displayCustomersTable($customers);

// Example searches
displaySearchResults("Search by First Name: Taylor", findCustomersByFirstName($customers, 'Taylor'));
displaySearchResults("Search by Last Name: Grande", findCustomersByLastName($customers, 'Grande'));
displaySearchResults("Search by Age: 34", findCustomersByAge($customers, 34));
displaySearchResults("Search by Phone: 303-555-2005", findCustomersByPhoneNumber($customers, '303-555-2005'));
?>

</body>
</html>