<?php

//included my database settings
include('config.php');

if(isset($_POST['Submit'])){

$fname = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];

//var_dump($fname,$age,$email);

//validation of inputs
if(empty($fname) || empty($age) || empty($email)) {
    echo 'One of your fields is empty';

}

else {
//insert into the databse
$sql = "insert into registerme(name, age, email)
values('".$fname."', '".$age."', '".$email."')";

$checkquery = mysqli_query($conn, $sql);

if($checkquery){
    echo '<div class="alert alert-success">Contact Info Saved Successfully</div>';
    //header('Location: index.php');
}else{
    $errorMsg = 'Error '.mysqli_error($conn);
}



}


} 

else {

}












?>