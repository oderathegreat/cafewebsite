<?php

require_once('config.php');

if(isset($_POST['login'])) {

    $user_email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM registeredusers WHERE firstname ='$first_name'  OR email = '$user_email' ");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_row($result > 0)) {

        if($password == row['password']){

            //login and redirect
            echo 'Login Success';
            
            header("Location:dashboard.php");
        }

        else {

            echo 'Password Missmatch please try again';
        }

    }

    else {

        echo 'username or email not found';
    }


}


      



?>