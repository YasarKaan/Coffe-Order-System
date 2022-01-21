<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Coffees</h2>

        <?php

        include('config/config.php');

        $sql = "SELECT * FROM tbl_coffee WHERE active='Yes'";


        $res=mysqli_query($con, $sql);


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

                <div class="box-3 float-container">
                        <?php

                        if($image_name=="")
                        {

                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {

                            ?>
                            <img src="images/<?php echo $image_name; ?>" alt="coffee" class="img-responsive img-curve">
                            <?php
                        }
                        ?>

                    <div class="coffee-menu-desc">
                        <h3 class="float-text text-white"><?php echo $title; ?></h3>

                        <br>


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
