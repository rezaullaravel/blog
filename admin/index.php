<?php
require_once'../vendor/autoload.php';
$login=new App\classes\Login();
$message="";
session_start();
if(isset($_SESSION['id'])){
header('Location:dashboard.php');
}
if(isset($_POST['btn'])){
     $message=$login->adminLoginCheck($_POST);
}
?>








<!doctype html>
<html>
<head>
<title>admin</title>
<link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>


<body>
<div class="container" style="margin-top:100px;">
     <div class="row">
	     <div class="col-sm-6 mx-auto">
		     	     <div class="card">
		     <div class="card-body">
			     <h5 class="card-title" style="margin-left:200px;">Admin Pannel</h5>
			     <h1 style="color:green;"><?php echo $message;?></h1>
			    <form action="" method="post">
				  <div class="form-group row">
					<label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
					<div class="col-sm-9">
					  <input type="email" class="form-control" id="inputEmail3" name="email">
					</div>
				  </div>
				  <div class="form-group row">
					<label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
					<div class="col-sm-9">
					  <input type="password" class="form-control" id="inputPassword3" name="password">
					</div>
				  </div>
				  
				  
				  <div class="form-group row">
					<div class="col-sm-12">
					  <button type="submit" class="btn btn-success btn-block" name="btn">Sign in</button>
					</div>
				  </div>
             </form>
			 </div>
		 </div>

		 </div>
	 </div>
</div>








<script src="../assets/js/popper.js"></script>
<script src="../assets/js/bootstrap.js"></script>
</body>
</html>