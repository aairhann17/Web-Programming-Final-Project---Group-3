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
        <a href="home.html">Home</a>
        <a href="artists.html">Artists</a>
        <a href="home.html#about">About Us</a>
        <a href="home.html#contact">Contact</a>
        <a href="login.html">Login</a>
        <a href="account.html">Sign Up</a>
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
        <p>Don't have an account? <a href="account.html">Create one here!</a></p>
    </div>
</body>
</html>
