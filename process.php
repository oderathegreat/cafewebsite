<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "caffedb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

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
        echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<h4><i class="icon fa fa-check"></i>Success!</h4>
</div>';
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