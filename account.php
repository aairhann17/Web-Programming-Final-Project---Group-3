<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - A World of Colour</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="account-page">
    <!-- Navbar -->
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="artists.php">Artists</a>
        <a href="home.php#about">About Us</a>
        <a href="home.php#contact">Contact</a>
        <a href="login.php">Login</a>
        <a href="account.php">Sign Up</a>
    </div>

    <!-- Create Account Form -->
    <div class="account-container">
        <h2>Create Account</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
            </div>
            <button type="submit">Create Account</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here!</a></p>
    </div>
</body>
</html>
