<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - A World of Colour</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="login-page">
    <!-- Navbar -->
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="artists.php">Artists</a>
        <a href="home.php#about">About Us</a>
        <a href="home.php#contact">Contact</a>
        <a href="login.php">Login</a>
        <a href="account.php">Sign Up</a>
        <a href="add_art.php">Add Art</a>
    </div>
     <!-- Login Content -->
    <div class="login-container">
        <h2>Login</h2>
        <form action="/login" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" id="submit">Login</button>
        </form>
        <?php
            session_start(); //start a session to manage logged in state

            //include the database configuaration
            require_once('config.inc.php');

            $conn = new mysqli(HOST, USER, PASSWORD, DB, PORT);

            //check for connection errors
            if($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            //check if the form is submitted
            if($_SERVER["REQUEST_METHOD"] === "POST") {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);

                //validate input
                if(empty($username) || empty($password)) {
                    echo "Both fields are required!";
                    exit();
                }

                //prepare SQL statement to retrieve the user
                $stmt = $conn->prepare("SELECT id, username, password FROM userData WHERE username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows === 1) {
                    $row = $result->fetch_assoc();

                    //verify the password
                    if(password_verify($password, $row['password'])) {
                        //store user info in a session
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['username'] = $row['username'];

                        //redirect to the home page
                        header("Location: home.php");
                        exit();
                    } else {
                        echo "Invalid password!";
                    }
                } else {
                    echo "Invalid username!";
                }

                $stmt->close();
            }

            $conn->close();
        ?>
        <p>Don't have an account? <a href="account.php">Create one here!</a></p>
    </div>
</body>
</html>
