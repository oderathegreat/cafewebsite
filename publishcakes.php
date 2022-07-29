<?php
  require_once('config.php');
  $upload_dir = 'uploads/';

  if (isset($_POST['Submit'])) {
    $cake_title = $_POST['caketitle'];
    $cake_price  = $_POST['cakeprice'];
    $cake_description = $_POST['cakedescription'];

	$imgName = $_FILES['image']['name'];
	$imgTmp = $_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];

        //var_dump($cake_image);


    if(empty($cake_title)){
			$errorMsg = 'Input title is empty';
		}elseif(empty($cake_price)){
			$errorMsg = 'Input price is empty';
		}elseif(empty($cake_description)){
			$errorMsg = 'Input description is empty';
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
			$sql = "insert into cakeproducts(title, price, description_box, image_pic)
					values('".$cake_title."', '".$cake_price."', '".$cake_description."', '".$userPic."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				echo 'New Cake Product Added Successfully';
				header('Location: dashboard.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}
  }
?>