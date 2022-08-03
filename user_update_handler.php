<?php
require_once "config.php";

$upload_dir = 'uploads/';

if(isset($_POST['SubmitUpdate'])){
   
   //$id = $_POST['id'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $contact = $_POST['contact'];
   $userId = $_POST["user_id"];
   

   $imgName = $_FILES['image']['name'];
       $imgTmp = $_FILES['image']['tmp_name'];
       $imgSize = $_FILES['image']['size'];

       //var_dump($imgName);

       if(empty($name)){
           $errorMsg = 'Please your input name is empty';
       }elseif(empty($contact)){
           $errorMsg = 'Please your input contact is empty';
       }elseif(empty($email)){
           $errorMsg = 'Please your input email is empty';
       }else{
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

           $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

           $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

           if(in_array($imgExt, $allowExt)){

               if($imgSize < 5000000){
                   move_uploaded_file($imgTmp ,$upload_dir.$userPic);
                  
               }else{
                   $errorMsg = 'Image too large';
                
               }
           }else{
               $errorMsg = 'Please select a valid image';
              
           }
           if(!isset($errorMsg)){

            $sql = "UPDATE `profile` SET `name`='$name',`contact`='$contact',`email`='$email',`image`='$userPic' WHERE id = '$userId'";
     
            $result = mysqli_query($conn,$sql);
            if($result){
                echo '<div class="alert alert-success">User Details Updated Successfully</div>';
                header('Location: displayprofile.php');
            }else{
                $errorMsg = 'Error '.mysqli_error($conn);
            }
     
        }
       }
   
  
   
   
}else{
    echo "Noma";
}