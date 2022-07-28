<?php


require_once('config.php');

if(isset($_POST['save_cake']))
{
    $cake_title = $_POST['inputcaketitle'];
    $cake_price = $_POST['inputcakeprice'];
    $cake_image =  $_POST['inputcakephoto']['name']; 
    $cake_description = $_POST['inputcakedescription']; 

    

    $query = "INSERT INTO cakeproducts(title,price,image_pic,description_box) VALUES ('$cake_title','$cake_price','$cake_image','$cake_description')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        move_uploaded_file($_FILES["inputcakephoto"]["tmp_name"], "upload/".$_FILES["file"]["name"]);

        $_SESSION['message'] = "Cake Product Created Successfully";
        header("Location: dashboard.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Cake Product Not Created";
        header("Location: dashboard.php");
        exit(0);
    }
}

?>
