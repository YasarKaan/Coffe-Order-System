<?php

include('../config/config.php');

if(isset($_GET['id']) && isset($_GET['image_name'])) //Either use '&&' or 'AND'
{

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];


    if($image_name != "")
    {

        $path = "../images/".$image_name;


        $remove = unlink($path);

        if($remove==false)
        {

            $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";

            header('location:manageCoffee.php');

            die();
        }

    }


    $sql = "DELETE FROM tbl_coffee WHERE id=$id";

    $res = mysqli_query($con, $sql);



    if($res==true)
    {

        $_SESSION['delete'] = "<div class='success'>Coffee Deleted Successfully.</div>";\
        header('location:manageCoffee.php');
    }
    else
    {

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Coffee.</div>";\
        header('location:manageCoffee.php');
    }



}
else
{

    $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
    header('location:manageCoffee.php');
}

?>