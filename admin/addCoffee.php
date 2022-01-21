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
        <h1>Add Coffee</h1>

        <br><br>

        <?php
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Coffee">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Coffee."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Coffee" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


        <?php


        if(isset($_POST['submit']))
        {



            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No";
            }

            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No";
            }


            if(isset($_FILES['image']['name']))
            {

                $image_name = $_FILES['image']['name'];


                if($image_name!="")
                {

                    $ext = end(explode('.', $image_name));


                    $image_name = "Coffee-Name-".rand(0000,9999).".".$ext;


                    $src = $_FILES['image']['tmp_name'];


                    $dst = "../images/".$image_name;


                    $upload = move_uploaded_file($src, $dst);


                    if($upload==false)
                    {

                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                        header('location:admin/addCoffee.php');

                        die();
                    }

                }

            }
            else
            {
                $image_name = "";
            }





            $sql2 = "INSERT INTO tbl_coffee SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                ";


            $res2 = mysqli_query($con, $sql2);



            if($res2 == true)
            {
                //Data inserted Successfullly
                $_SESSION['add'] = "<div class='success'>Coffee Added Successfully.</div>";
                header('location:manageCoffee.php');
            }
            else
            {
                //Failed to Insert Data
                $_SESSION['add'] = "<div class='error'>Failed to Add Coffee.</div>";
                header('location:manageCoffee.php');
            }


        }

        ?>


    </div>
</div>

<?php include('footerAdmin.php'); ?>