<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - A World of Colour</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="login-page">
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
        <p>Don't have an account? <a href="/register">Create here!</a></p>
    </div>
</body>
</html>