<?php
include "config/config.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


    $uname = $_SESSION['user_name'];
    $x = mysqli_query($con, "select * from users where user_name='$uname'");
    $y = mysqli_fetch_array($x);
    $name = $y['name'];
    $old = $y['password'];

    if (!empty($_POST)) {
        $p1 = md5($_POST['p1']);
        $p2 = md5($_POST['p2']);
        if ($old == $p1) {
            $u = mysqli_query($con, "update users set password='$p2' where user_name='$uname'");
        }
        if ($u == true) {
            header("Location: changePassword.php?success=Your password changed successfully");
        } else {
            header("Location: changePassword.php?success=Your password could not changed");
        }
    }
}

?>
<link rel="stylesheet" type="text/css" href="css/landingPage.css">
<form method="post" action="" >
    <h2>Change Password</h2>
    <label>Old Password : </label>

    <input type="password"
           name="p1"
           placeholder="Enter Old Password" /><br>

    <label>New Password : </label>
    <input type="password"
           name="p2"
           placeholder="Enter New Password" /><br>

    <button type="submit">Change Password</button>
    <a href="home.php" class="ca">Back to the Homepage</a>

</form>


