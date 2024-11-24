<?php
// Create a connection to the database
require_once('config.inc.php');
$conn = new mysqli(HOST, USER, PASSWORD, DB, PORT);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //validate the inputs
    if(empty($username) || empty($email) || empty($password)) {
        echo "All fields are required! Please fill all of them in!";
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format! Please input something like this: john.smith@gmail.com";
        exit();
    }

    //checks if username, email, or password has already been used
    $checkStmt = $conn->prepare("SELECT * FROM userData WHERE Username = ? OR Email = ?");
    $checkStmt->bind_param("ss", $username, $email);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if($result->num_rows > 0) {
        echo "Username or email is already in use!";
        $checkStmt->close();
        exit();
    }
    $checkStmt->close();
    
    // Hash the password before storing it in the database for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO userData (Username, Email, Password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    // Execute the query
    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}
?>
