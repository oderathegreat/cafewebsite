<?php
include 'config.php';
?>

<?php 

if(isset($_GET['update'])){

    $id = $_GET['update'];

$query = "SELECT * FROM profile  WHERE id = $id";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
    
    while($row = mysqli_fetch_array($result)){
        
        $id    = $row['id'];
        $name  = $row['name'];
        $contact = $row['contact'];
        $email = $row['email'];
        $image = $row['image'];

        }
    }
}

if(isset($_POST['Submit'])){
   
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

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
		}
    
   
    
    if(!isset($errorMsg)){

        $sql = "update profile set name = '$name', contact = '$contact', email = '$email', image = '$userPic', ";

        $result = mysqli_query($conn,$sql);
        if($result){
            echo '<div class="alert alert-success">User Details Updated Successfully</div>';
            header('Location: index.php');
        }else{
            $errorMsg = 'Error '.mysqli_error($conn);
        }

    }
 
    
    
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cafe Website</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/logo.png" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="#" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="../dashboard.php" ><i class="fa fa-desktop "></i>Dashboard <span class="badge"></span></a>
                    </li>
                   

                    <li>
                        <a href="/products/cakeproducts.php"><i class="fa fa-table "></i>Upload Cake  <span class="badge"></span></a>
                    </li>
                    <li>
                        <a href="blank.html"><i class="fa fa-edit "></i>Upoad Content <span class="badge"></span></a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-qrcode "></i>Banner Ads</a>
                    </li>
                    <li>
                    <a href="#"><i class="fa fa-edit "></i>Cake Promos </a>
                    </li>

                    <li>
                       
                    </li>
                    
                    
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>Upload Section For Cake Products</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                    
                    
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
             
                  <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    
                        <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="name">Enter Name</label>
                      <input type="text" class="form-control" name="name"  placeholder="Enter Name" value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                      <label for="contact">Enter Contact:</label>
                      <input type="text" class="form-control" name="email" placeholder="Enter Contact" value="<?php echo $contact ?>">
                    </div>

                    <div class="form-group">
                      <label for="contact">Enter Email:</label>
                      <input type="email" class="form-control" name="contact" placeholder="Enter Email" value="<?php echo $email ?>">
                    </div>
           
                    
                    <div class="form-group">
                      <label for="image">Choose Image</label>

                      <input type="file" class="form-control" name="image" placeholder="Update Image" value="<?php echo $image ?>">
                      <img src= "<?= "uploads/".$image?>" alt="" width="100px" height="100px" name="image" class="thumbnail">
                    </div>
                    <div class="form-group">
                      <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
                    </div>
                     
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

                  
                  <!-- /. ROW  -->    
                 <div class="row text-center pad-top">
                   
           
                 
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
 <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
