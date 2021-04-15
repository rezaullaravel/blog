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
if(isset($_GET['manage'])){
     $givenResult=$login->seeBlgInformation();
	// $blg=mysqli_fetch_assoc($givenResult);
	 
}

$id=$_GET['id'];
     $givenResult=$login->seeBlgInfoById($id);
	 $blogInfo=mysqli_fetch_assoc($givenResult);


?>
<?php
$sms='';
if(isset($_GET['delete'])){
     $id=$_GET['id'];
	 $sms=$login->deleteBlgInfoById($id);
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
	     <div class="col-sm-12 mx-auto">
		     	     <div class="card">
		     <div class="card-body">
			 <h1><?php echo $sms;?></h1>
			 
<table class="table table-dark">
     <tr>
	     <th>Blog Info</th>
		 <td><?php echo $blogInfo['id'];?></td>
	 </tr>
	 
	 <tr>
	     <th>Blog Title</th>
		 <td><?php echo $blogInfo['blog_Title'];?></td>
	 </tr>
	 
	 <tr>
	     <th>Category ID</th>
		 <td><?php echo $blogInfo['category_id'];?></td>
	 </tr>
	 
	 <tr>
	     <th>Short Description</th>
		 <td><?php echo $blogInfo['short_des'];?></td>
	 </tr>
	 
	 <tr>
	     <th>Long Description</th>
		 <td><?php echo $blogInfo['long_des'];?></td>
	 </tr>
	 
	 <tr>
	     <th>Blog Image</th>
		 <td><img src="<?php echo $blogInfo['blog_img'];?> " alt="" height="100" width="50"/></td>
	 </tr>
	 
	 <tr>
	     <th>Publication Status</th>
		 <td><?php echo $blogInfo['StatusOfPublication']==1?'Published':'Unpublished'?></td>
	 </tr>
</table>
			 </div>
		 </div>

		 </div>
	 </div>
</div>










</body>
</html>