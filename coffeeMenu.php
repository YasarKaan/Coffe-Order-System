<section class="coffee-menu">
    <div class="container">
        <h2 class="text-center">Coffee Menu</h2>

        <?php

        include('config/config.php');

        $sql = "SELECT * FROM tbl_coffee WHERE active='Yes'";

        //Execute the Query
        $res=mysqli_query($con, $sql);

        //Count Rows
        $count = mysqli_num_rows($res);


        if($count>0)
        {

            while($row=mysqli_fetch_assoc($res))
            {
                //Get the Values
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                ?>

                <div class="coffee-menu-box">
                    <div class="coffee-menu-img">
                        <?php
                        //CHeck whether image available or not
                        if($image_name=="")
                        {
                            //Image not Available
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //Image Available
                            ?>
                            <img src="images/<?php echo $image_name; ?>" alt="coffee" class="img-responsive img-curve">
                            <?php
                        }
                        ?>

                    </div>

                    <div class="coffee-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="coffee-price">$<?php echo $price; ?></p>
                        <p class="coffee-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="order.php?id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

                <?php
            }
        }
        else
        {

            echo "<div class='error'>Coffee not found.</div>";
        }
        ?>

        <div class="clearfix"></div>
    </div>


</section>
