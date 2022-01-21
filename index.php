
<!DOCTYPE html>
<html>

<head>
    <title>Coffee Machine</title>
    <link rel="stylesheet" type="text/css" href="css/landingPage.css">
</head>

<body>
<form action="login.php" method="post">
    <h2>Login to Coffee Machine</h2>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <label>User Name</label>
    <input type="text" name="uname" placeholder="User Name"><br>

    <label>Password</label>
    <input type="password" name="password" placeholder="Password"><br>

    <button type="submit">Login</button>
    <a href="signup.php" class="ca">Create an account</a>
    <a href="adminLoginPage.php" class="ca">Admin Login</a>
</form>
</body>
</html>