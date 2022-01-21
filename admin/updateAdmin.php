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
                <ul>
                    <li><a href="adminHome.php">Home</a></li>
                    <li><a href="manageAdmin.php">Admin</a></li>
                    <li><a href="manageCoffee.php">Coffee</a></li>
                    <li><a href="manageOrder.php">Order</a></li>
                    <li><a href="adminLogout.php">Logout</a></li>
                </ul>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>

            <br><br>

            <?php

            $id=$_GET['id'];


            $sql="SELECT * FROM tbl_admin WHERE id=$id";


            $res=mysqli_query($con, $sql);


            if($res==true)
            {

                $count = mysqli_num_rows($res);

                if($count==1)
                {


                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['name'];
                    $username = $row['user_name'];
                }
                else
                {

                    header('location:admin/manageAdmin.php');
                }
            }

            ?>


            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="user_name" value="<?php echo $username; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>
        </div>
    </div>

<?php


if(isset($_POST['submit']))
{

    $id = $_POST['id'];
    $full_name = $_POST['name'];
    $username = $_POST['user_name'];


    $sql = "UPDATE tbl_admin SET
        name = '$full_name',
        user_name = '$username' 
        WHERE id='$id'
        ";


    $res = mysqli_query($con, $sql);


    if($res==true)
    {

        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";

        header('location:manageAdmin.php');
    }
    else
    {

        $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";

        header('location:manageAdmin.php');
    }
}

?>


<?php include('footerAdmin.php'); ?>