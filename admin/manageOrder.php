
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
            <h1>Manage Order</h1>

            <br /><br /><br />

            <?php
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            ?>
            <br><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Coffee</th>
                    <th>Price</th>
                    <th>Qty.</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>

                <?php

                $sql = "SELECT * FROM tbl_order ORDER BY id DESC";

                $res = mysqli_query($con, $sql);

                $count = mysqli_num_rows($res);

                $sn = 1;

                if($count>0)
                {

                    while($row=mysqli_fetch_assoc($res))
                    {

                        $id = $row['id'];
                        $coffee = $row['coffee'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $total = $row['total'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_email = $row['customer_email'];
                        $customer_address = $row['customer_address'];

                        ?>

                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $coffee; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php echo $qty; ?></td>
                            <td><?php echo $total; ?></td>
                            <td><?php echo $order_date; ?></td>

                            <td>
                                <?php

                                if($status=="Ordered")
                                {
                                    echo "<label>$status</label>";
                                }
                                elseif($status=="On Delivery")
                                {
                                    echo "<label style='color: orange;'>$status</label>";
                                }
                                elseif($status=="Delivered")
                                {
                                    echo "<label style='color: green;'>$status</label>";
                                }
                                elseif($status=="Cancelled")
                                {
                                    echo "<label style='color: red;'>$status</label>";
                                }
                                ?>
                            </td>

                            <td><?php echo $customer_name; ?></td>
                            <td><?php echo $customer_contact; ?></td>
                            <td><?php echo $customer_email; ?></td>
                            <td><?php echo $customer_address; ?></td>
                            <td>
                                <a href="updateOrder.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                            </td>
                        </tr>

                        <?php

                    }
                }
                else
                {

                    echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                }
                ?>


            </table>
        </div>

    </div>

<?php include('footerAdmin.php'); ?>