<?php
include('../config/config.php');


?>


<html>
<head>
    <title>Coffee Machine Admin Page</title>

    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

<div class="menu text-center">
    <div class="wrapper">
        <ul>
            <li><a href="adminHome.php">Home</a></li>
            <li><a href="manageAdmin.php">Admin</a></li>
            <li><a href="manageCoffee.php">Coffee</a></li>
            <li><a href="manageOrder.php">Order</a></li>
            <li><a href="adminLogout.php">Logout</a></li>
        </ul>
    </div>
</div>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php
        if(isset($_SESSION['add'])) //Checking whether the Session is Set of Not
        {
            echo $_SESSION['add']; //Display the Session Message if SEt
            unset($_SESSION['add']); //Remove Session Message
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="user_name" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('footerAdmin.php'); ?>


<?php


if(isset($_POST['submit']))
{



    $full_name = $_POST['name'];
    $username = $_POST['user_name'];
    $password = md5($_POST['password']); //Password Encryption with MD5


    $sql = "INSERT INTO tbl_admin SET 
            name='$full_name',
            user_name='$username',
            password='$password'
        ";


    $res = mysqli_query($con, $sql) or die(mysqli_error());


    if($res==TRUE)
    {

        $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";

        header("location:manageAdmin.php");
    }
    else
    {

        $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";

        header("location:admin/addAdmin.php");
    }

}

?>