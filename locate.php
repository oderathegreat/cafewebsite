<!DOCTYPE html>
<html lang="en">
<head>
  <title>Locate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Enter User Details</h1>
  
</div>
  
<div class="container">
  <div class="row">
    
  <form action="addlocation.php" method="POST">

  <input type="text"  name="name" placeholder="Enter Name" />
  
  <input type="number"  name="age" placeholder="Enter Age" />
  
  <input type="email"  name="email" placeholder="Enter Email" />

  <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>



</form>
  </div>
</div>

</body>
</html>