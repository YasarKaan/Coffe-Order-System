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
            <h1>Manage Coffee</h1>

            <br /><br />

            <!-- Button to Add Admin -->
            <a href="   addCoffee.php" class="btn-primary">Add Coffee</a>

            <br /><br /><br />

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

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['unauthorize']))
            {
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            ?>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php
                $sql = "SELECT * FROM tbl_coffee";


                $res = mysqli_query($con, $sql);


                $count = mysqli_num_rows($res);

                $sn=1;

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {

                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>

                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $title; ?></td>
                            <td>$<?php echo $price; ?></td>
                            <td>
                                <?php

                                if($image_name=="")
                                {

                                    echo "<div class='error'>Image not Added.</div>";
                                }
                                else
                                {

                                    ?>
                                    <img src="../images/<?php echo $image_name; ?>" width="100px">
                                    <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="deleteCoffee.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Coffee</a>
                            </td>
                        </tr>

                        <?php
                    }
                }
                else
                {

                    echo "<tr> <td colspan='7' class='error'> Coffee not Added Yet. </td> </tr>";
                }

                ?>


            </table>
        </div>

    </div>

<?php include('footerAdmin.php'); ?>