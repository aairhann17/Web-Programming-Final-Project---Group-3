<?php
define('HOST', 'localhost');
define('DB', 'worldofcolourdb');
define('USER', 'root');
define('PASSWORD', '');
define('PORT', NULL);

$conn = new mysqli(HOST, USER, PASSWORD);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
$sqlFile = 'paintings_database.sql';

$sqlContent = file_get_contents($sqlFile);

if ($sqlContent === false) {
    die("Error reading the SQL file.");
}

// Execute the SQL commands
if ($conn->multi_query($sqlContent)) {
    echo "SQL file executed successfully.";
} else {
    echo "Error executing SQL: " . $conn->error;
}
$conn->close();
?>
