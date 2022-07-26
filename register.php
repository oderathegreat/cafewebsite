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
        $countyname = mysqli_real_escape_string($conn, $_POST["county"]);
        $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
        $cpassword = mysqli_real_escape_string($conn, md5($_POST["cpassword"]));
      

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM registeredusers WHERE email='{$email}'")) > 0) {
            echo "<script>alert('{$email} - email has already taken.');</script>";
        }
        
        else {
            if ($password === $cpassword) {
                $sql = "INSERT INTO registeredusers (firstname,lastname,email,phonenumber,county,userpassword) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$phone}', '{$countyname}','{$password}')";
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
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    
   <?php include 'header.php' ?>


   

    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="reservation">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
        
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                    <form class="" action="" method="post" autocomplete="off">
    
      <input type="text" name="fname" id = "name" required value="" placeholder="Enter First Name"> <br>

      <input type="text" name="lname" id = "name" required value="" placeholder="Enter Last Name"> <br>

      <input type="email" name="email" id = "email" required value=""  placeholder="Enter email" > <br>

      <input type="number" name="phone" id = "email" required value=""  placeholder="Enter Phone number" > <br>

      <input type="text" name="county"  required value=""  placeholder="Enter your county" > <br>
      
      <input type="password" name="password" id = "password" required value="" placeholder="Enter password"> <br>

      <input type="password" name="cpassword" id = "confirmpassword" required value="" placeholder="Confirm Password"> <br>
      <button type="submit" name="submit">Create Account</button>
    </form>




                      
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Menu Area Ends ***** -->

    <!-- ***** Chefs Area Starts ***** -->
   
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Reservation Us Area Starts ***** -->
    
    
    <!-- ***** Reservation Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
  
    <!-- ***** Chefs Area Ends ***** --> 
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.
                        
                        <br>Design: TemplateMo</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>