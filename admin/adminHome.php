
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
        <h1>Dashboard</h1>
        <br><br>
        <?php
        if(isset($_SESSION['adminLogin']))
        {
            echo $_SESSION['adminLogin'];
            unset($_SESSION['adminLogin']);
        }
        ?>
        <br><br>


        <div class="col-4 text-center">

            <?php
            //Sql Query
            $sql2 = "SELECT * FROM tbl_coffee";
            //Execute Query
            $res2 = mysqli_query($con, $sql2);
            //Count Rows
            $count2 = mysqli_num_rows($res2);
            ?>

            <h1><?php echo $count2; ?></h1>
            <br />
            Coffees
        </div>

        <div class="col-4 text-center">

            <?php
            //Sql Query
            $sql3 = "SELECT * FROM tbl_order";
            //Execute Query
            $res3 = mysqli_query($con, $sql3);
            //Count Rows
            $count3 = mysqli_num_rows($res3);
            ?>

            <h1><?php echo $count3; ?></h1>
            <br />
            Total Orders
        </div>

        <div class="col-4 text-center">

            <?php
            $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";


            $res4 = mysqli_query($con, $sql4);


            $row4 = mysqli_fetch_assoc($res4);


            $total_revenue = $row4['Total'];

            ?>

            <h1>$<?php echo $total_revenue; ?></h1>
            <br />
            Revenue Generated
        </div>

        <div class="clearfix"></div>

    </div>
</div>


<?php include('footerAdmin.php') ?>