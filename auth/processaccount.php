<?php
    session_start();
    if (isset($_SESSION["SESSION_EMAIL"])) {
        header("Location: dashboard.php");
    }

    if (isset($_POST["submit"])) {
        include 'config.php';

        $firstname = mysqli_real_escape_string($conn, $_POST["fname"]);
        $lastname = mysqli_real_escape_string($conn, $_POST["lname"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
        $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
        $cpassword = mysqli_real_escape_string($conn, md5($_POST["cpassword"]));
      

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM registeredusers WHERE email='{$email}'")) > 0) {
            echo "<script>alert('{$email} - email has already taken.');</script>";
        }
        
        else {
            if ($password === $cpassword) {
                $sql = "INSERT INTO registeredusers (firstname,lastname,email,phonenumber,userpassword) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$phone}', '{$password}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {

                     //echo success then redirect

                     echo "<script>alert('Success account created.');</script>";

                    //if result is successfull navigate to dashboard page
                    header("Location: dashboard.php");

                }else {
                    echo "<script>Error: ".$sql.mysqli_error($conn)."</script>";
                }
            }else {
                echo "<script>alert('Password and confirm password do not match.');</script>";
            }
        }
    }
?>



