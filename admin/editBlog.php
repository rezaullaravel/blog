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

if(isset($_GET['edit'])){
$id=$_GET['id'];
     $givenResult=$login->seeBlgInfoById($id);
	 $blogInfo=mysqli_fetch_assoc($givenResult);
	 }
	 
if(isset($_POST['btn'])){
     $login->updateBlgInfoById($_POST);

}

$result=$login->getAllPublishedCategoryInfo();




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
			     <!--<h1><?php echo $sms;?></h1>-->
			    <form action="" method="post" name="editBlogForm" enctype="multipart/form-data">
				  <div class="form-group row">
					<label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
					<div class="col-sm-9">
					  <select name="category_id" class="form-control">
					    <option>---Select Category Name---</option>
						 <?php while($CATEGORY=mysqli_fetch_assoc($result)){?>
					     <option value="<?php echo $CATEGORY['id'];?>"><?php echo $CATEGORY['goryName'];?></option>
						 <?php }?>
					  </select>
					</div>
				  </div>
				  <div class="form-group row">
					<label for="inputPassword3" class="col-sm-3 col-form-label">Blog Title</label>
					<div class="col-sm-9">
					  
					  <input type="text" name="blog_Title" value="<?php echo $blogInfo['blog_Title'];?>"class="form-control">
					  <input type="hidden" name="id" value="<?php echo $blogInfo['id'];?>" class="form-control">
					</div>
				  </div>
				  
				  <div class="form-group row">
					<label for="inputPassword3" class="col-sm-3 col-form-label">Blog Short Description</label>
					<div class="col-sm-9">
					  
					  <textarea class="form-control" name="short_des" value="<?php echo $blogInfo['short_des'];?>"></textarea>
					</div>
				  </div>
				  
				  <div class="form-group row">
					<label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
					<div class="col-sm-9">
					  
					  <textarea class="form-control textarea" name="long_des"><?php echo $blogInfo['long_des'];?></textarea>
					</div>
				  </div>
				  
				  <div class="form-group row">
					<label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
					<div class="col-sm-9">
					  
					  <input type="file" name="blog_img"  accept="image/*">
					  <img/ src="<?php echo $blogInfo['blog_img'];?>" alt="" height="100" width="50">
					</div>
				  </div>



				  
				 <div class="form-group row">
					<label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
					<div class="col-sm-9">
					  <input type="radio" name="StatusOfPublication" value="1"  value="<?php echo $blogInfo['pbStatas'];?>" >Published
					  <input type="radio" name="StatusOfPublication" value="0" value="<?php echo $blogInfo['pbStatas'];?>">Unpublished
					</div>
				 </div>
				  
				  
				  <div class="form-group row">
					<div class="col-sm-12">
					  <button type="submit" class="btn btn-success btn-block" name="btn">Update Blog Info</button>
					</div>
				  </div>
             </form>
			 </div>
		 </div>

		 </div>
	 </div>
</div>





<script src="../assets/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'.textarea' });</script>
<script>
document.forms['editBlogForm'].elements['category_id'].value='<?php echo $blogInfo['category_id'];?>';
</script>

</body>
</html>