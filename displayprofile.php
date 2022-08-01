<?php

include 'config.php';

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" http-equiv="Refresh" content="width=device-width, initial-scale=1.0" />
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


                    
    <table class="table table-hover table-striped">
        <tr>
            <th>ID Nunber</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

       
<?php  		            
		
$query = "SELECT * FROM profile ORDER BY id DESC ";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
    
    while($row = mysqli_fetch_array($result)){
        
        $id    = $row['id'];
        $name  = $row['name'];
        $email = $row['contact'];
        $batch = $row['email'];
        $image = $row['image'];

?>
        
        <tr>
            <td><?=$id; ?></td>
            <td><?=$name; ?></td>
            <td><?=$email; ?></td>
            <td><?=$batch; ?></td>
            <td>
               <img src= "<?= "uploads/".$image?>" alt="<?= $name ?>" class="thumbnail" width="150px" height="75px">
            </td>
            <td><a href="updateprofile.php?update=<?php echo $id ?>" class="btn btn-success btn-sm" role="button">Update</a>
            <a href="displayprofile.php?delete=<?php echo $id ?>" class="btn btn-danger btn-sm" id="delete" role="button">Delete</a></td>
        </tr>
<?php
    }
}  
        
    if(isset($_GET['delete'])){
        
        $id = $_GET['delete'];

        $image = "SELECT * FROM profile WHERE id = $id";
        
        $query1 = mysqli_query($conn,$image);

        while($row = mysqli_fetch_array($query1))
        {
             $img= $row['image'];
        }

            unlink("uploads/".$img);

        $querydelete = "DELETE FROM profile WHERE id = $id";
        
        $result = mysqli_query($conn,$querydelete);
        
        if($result){

            echo 'Record deleted';

           //header("Location:dashboard.php");
            
        }
    }    
         
?>

    </table>
</div>

<script>
    $(document).ready(function(){

        $('#delete').click(function(){
            if(!confirm("do you want to delete?"))
            {
                return false;
            }
            else
            {
                return true;
            }
        });


    });
</script>