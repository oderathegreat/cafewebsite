<?php

require_once('config.php');

if(isset($_POST['submit'])) {

    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) ) {

        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phone'];

        //var_dump($fullname,$email,$phonenumber);

        //Insert Data to database 
        $query = "insert into customers(fullnames,email,phonenumber) values('$fullname' , '$email', '$phonenumber')";
     
       //run query
       $run = mysqli_query($conn, $query) or die('Error: ' . mysqli_error($conn));;

       //check if our query runs
       if ($run) {
        echo 'Reservation Made Successfully';
       }
       else {
        echo 'Data not  submitted';
       }


    }

    else {
        echo 'All fields are required';
       

    }

}





























?>