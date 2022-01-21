<!DOCTYPE html>
<html>

<head>
    <title>Coffee Machine</title>
    <link rel="stylesheet" type="text/css" href="css/landingPage.css">
</head>

<body>
<form action="adminLogin.php" method="post">
    <h2>Admin Login</h2>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <label>Username</label>
    <input type="text" name="uname" placeholder="User Name"><br>

    <label>Password</label>
    <input type="password" name="password" placeholder="Password"><br>

    <button type="submit">Login</button>
    <a href="index.php" class="ca">Back to Login Page</a>
</form>
</body>
</html>