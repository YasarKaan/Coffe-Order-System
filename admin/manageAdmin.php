
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
        <h1>Manage Admin</h1>

        <br />

        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }

        if(isset($_SESSION['pwd-not-match']))
        {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }

        if(isset($_SESSION['change-pwd']))
        {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }

        ?>
        <br><br><br>


        <a href="addAdmin.php" class="btn-primary">Add Admin</a>

        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>


            <?php

            $sql = "SELECT * FROM tbl_admin";

            $res = mysqli_query($con, $sql);


            if($res==TRUE)
            {

                $count = mysqli_num_rows($res);

                $sn=1;


                if($count>0)
                {

                    while($rows=mysqli_fetch_assoc($res))
                    {

                        $id=$rows['id'];
                        $full_name=$rows['name'];
                        $username=$rows['user_name'];


                        ?>

                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="updateAdmin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                            </td>
                        </tr>

                        <?php

                    }
                }
            }

            ?>



        </table>

    </div>
</div>


<?php include('footerAdmin.php'); ?>
