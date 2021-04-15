<?php
require_once '../vendor/autoload.php';
$login=new App\classes\Login();
session_start();
if($_SESSION['id']==null){
header('Location:index.php');
}
if(isset($_GET['logout'])){
     $login->adminLogout();
}
    

     $id=$_GET['id'];
	 $Result=$login->viewGoryInfoById($id);
	 $rows=mysqli_fetch_assoc($Result);
	 $sms ='';
	 if(isset($_POST['btn'])){
	     $login->editGoryInfoById($_POST);
	 }
?>






<!doctype html>
<html>
<head>
<title>dashboard</title>
</head>

<body>
<?php
include('menu.php');
?>



<div class="container" style="margin-top:10px;">
     <div class="row">
	     <div class="col-sm-8 mx-auto">
		     	     <div class="card">
		     <div class="card-body">
			     <!--<h1 style="color:red; margin-left:150px;"><?php echo $sms;?></h1>-->
			    <form action="" method="post">
				  <div class="form-group row">
					<label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
					<div class="col-sm-9">
					  <input type="text" class="form-control"  name="goryName" value="<?php echo $rows['goryName'];?>">
					  <input type="hidden" class="form-control"  name="id" value="<?php echo $rows['id'];?>">
					</div>
				  </div>
				  <div class="form-group row">
					<label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
					<div class="col-sm-9">
					  
					  <textarea class="form-control" name="explanation" ><?php echo $rows['explanation'];?></textarea>
					</div>
				  </div>
				  
				 <div class="form-group row">
					<label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
					<div class="col-sm-9">
					  <input type="radio" name="statusStyle" value="1" value="<?php echo $rows['statusStyle'];?>">Published
					  <input type="radio" name="statusStyle" value="0" value="<?php echo $rows['statusStyle'];?>">Unpublished
					</div>
				 </div>
				  
				  
				  <div class="form-group row">
					<div class="col-sm-12">
					  <button type="submit" class="btn btn-success btn-block" name="btn">Update</button>
					</div>
				  </div>
             </form>
			 </div>
		 </div>

		 </div>
	 </div>
</div>









</body>
</html>