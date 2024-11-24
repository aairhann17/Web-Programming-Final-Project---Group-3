<?php
// Create a connection to the database
require_once('config.inc.php');
$conn = new mysqli(HOST, USER, PASSWORD, DB, PORT);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //validate the inputs
    if(empty($username) || empty($email) || empty($password)) {
        $message = "All fields are required!";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format! Try something like johnsmith123@gmail.com";
    } else {
        //checks if username, email, or password has already been used
        $checkStmt = $conn->prepare("SELECT * FROM userData WHERE Username = ? OR Email = ?");
        $checkStmt->bind_param("ss", $username, $email);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if($result->num_rows > 0) {
            $message = "Username or email already in use!";
        } else {
            // Hash the password before storing it in the database for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO userData (Username, Email, Password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            // Execute the query
            if ($stmt->execute()) {
                header("Location: home.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            stmt->close();
        }
        $checkStmt->close();
    }
}

// Close the statement and connection
$conn->close();
?>
