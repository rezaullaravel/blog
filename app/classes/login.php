<?php
namespace App\classes;
use App\classes\database;
class Login{
     public function adminLoginCheck($data){
	     $email=$data['email'];
	     $password=md5($data['password']);
	     $sql="SELECT * FROM users WHERE email='$email' AND password='$password' ";
		 if(mysqli_query(database::dbConnection(),$sql)){
		     $result=mysqli_query(database::dbConnection(),$sql);
			 $users=mysqli_fetch_assoc($result);
			 //echo '<pre>';
			 //print_r($users);
			 if($users){
			     session_start();
				 $_SESSION['id']=$users['id'];
				 $_SESSION['name']=$users['name'];
			     header('Location:dashboard.php');
			 } else{
			     $message='please enter valid email address and password';
				 return $message;
			 }
			 
		     
		 } else {
		     die('Query problem'.mysqli_error(database::dbConnection()));
		 }
	 }
	 
	 
	 public function adminLogout(){
	 unset($_SESSION['id']);
	 unset($_SESSION['name']);
	     header('Location:index.php');
	 }
	 
	 public function saveCategoryInfo($receive){
	     $a=$receive['goryName'];
	     $b=$receive['explanation'];
	     $c=$receive['statusStyle'];
		 $sql="INSERT INTO  categoryInfo(goryName,explanation,statusStyle) VALUES('$a','$b','$c')";
		 if(mysqli_query(database::dbConnection(),$sql)){
		     $sms='Category info saved successfully';
			 return $sms;
		 } else{
		     die('query problem'.mysqli_error(database::dbConnection()));
		 }
		 
	 }
	 
	 public function viewGoryInfo(){
	     $sql="SELECT * FROM categoryInfo";
		  if(mysqli_query(database::dbConnection(),$sql)){
		     $x=mysqli_query(database::dbConnection(),$sql);
			 return $x;
			 //$row=mysqli_fetch_assoc($Result);
			 //echo '<pre>';
			 //print_r($row);
		    
		 } else{
		     die('query problem'.mysqli_error(database::dbConnection()));
		 }
	 }
	 
	 public function viewGoryInfoById($id){
	    $sql="SELECT * FROM categoryInfo WHERE id='$id'";
		if(mysqli_query(database::dbConnection(),$sql)){
		     $Result=mysqli_query(database::dbConnection(),$sql);
			 return $Result;
			 //$row=mysqli_fetch_assoc($Result);
			 //echo '<pre>';
			 //print_r($row);
		    
		 } else{
		     die('query problem'.mysqli_error(database::dbConnection()));
		 }

	 }
	 
	 public function editGoryInfoById($data){
	     $id=$data['id'];
	     $goryName=$data['goryName'];
	     $explanation=$data['explanation'];
	     $statusStyle=$data['statusStyle'];
		 $sql="UPDATE categoryInfo SET goryName='$goryName',explanation='$explanation',statusStyle='$statusStyle' WHERE id='$id'";
		 if(mysqli_query(database::dbConnection(),$sql)){
		     //$sms='updated successfully';
			 //return $sms;
			 header('Location:manage-category.php');
		 } else{
		     die('query problem'.mysqli_error(database::dbConnection()));
		 }
	 }
	 public function deleteGoryInfoById($id){
	     $sql="DELETE FROM categoryInfo WHERE id='$id'";
		 		 if(mysqli_query(database::dbConnection(),$sql)){
				 $sms='Deleted successfully';
				 return $sms;
		 } else{
		     die('query problem'.mysqli_error(database::dbConnection()));
		 }

	 }
	 
	 
	 
	 
	 

	 
	 public function seeBlgInformation(){
	     $sql="SELECT b.*,c.goryName FROM bloginfo as b,categoryinfo as c WHERE b.category_id=c.id";
		 if(mysqli_query(database::dbConnection(),$sql)){
		     $givenResult=mysqli_query(database::dbConnection(),$sql);
			 //$blg=mysqli_fetch_assoc($givenResult);
			 //echo '<pre>';
			 //print_r($blg);
			 return $givenResult;
		     
		 } else{
		     die('query problem'.mysqli_error(database::dbConnection()));
		 }
	 }
	 
	 public function seeBlgInfoById($id){
	     $sql="SELECT * FROM bloginfo WHERE id='$id'";
		 		 if(mysqli_query(database::dbConnection(),$sql)){
		     $givenResult=mysqli_query(database::dbConnection(),$sql);
			 //$blg=mysqli_fetch_assoc($givenResult);
			 //echo '<pre>';
			 //print_r($blg);
			 return $givenResult;
		     
		 } else{
		     die('query problem'.mysqli_error(database::dbConnection()));
		 }

	 }
	 
	
	 
	 public function deleteBlgInfoById($id){
	     $sql="DELETE FROM bloginfo WHERE id='$id'";
		 		 if(mysqli_query(database::dbConnection(),$sql)){
				     $sms='blog info deleted successfully';
					 return $sms;
		     
		 } else{
		     die('query problem'.mysqli_error(database::dbConnection()));
		 }

	 }
	 
	 public function getAllPublishedCategoryInfo(){
	     $sql="SELECT * FROM categoryinfo WHERE statusStyle=1";
		 if(mysqli_query(database::dbConnection(),$sql)){
		     $result=mysqli_query(database::dbConnection(),$sql);
			 return $result;
		     
		 } else{
		     die('query problem'.mysqli_error(database::dbConnection()));
		 }
	 }
	 
	 public function updateBlgInfoById($data){
	     $blogImg=$_FILES['blog_img']['name'];
		 if($blogImg){
		 $sql="SELECT * FROM bloginfo WHERE id='$data[id]'";
		 $Result=mysqli_query(database::dbConnection(),$sql);
		 $blogInfo=mysqli_fetch_assoc($Result);
		 unlink($blogInfo['blog_img']);
		 
		    $p=$data['category_id'];
	     $q=$data['blog_Title'];
	     $r=$data['short_des'];
	     $s=$data['long_des'];
	    
	     $u=$data['StatusOfPublication'];
	 
$directory='../assets/images/';
$imageUrl=$directory.$_FILES['blog_img']['name'];
$fileType=pathinfo($_FILES['blog_img']['name'],PATHINFO_EXTENSION);

$check=getimagesize($_FILES['blog_img']['tmp_name']);

if($check){
if(file_exists($imageUrl)){
die('This image already exit. please select another one');
}else{
if($_FILES['blog_img']['size']>3145728){
die('Your image size is too large. plz select within 3 mb');
}else{
if($fileType!='jpg' && $fileType!='png' && $fileType!='JPG'){
die('Image type is not supported');
}else{
move_uploaded_file($_FILES['blog_img']['tmp_name'],$imageUrl);
$sql="UPDATE bloginfo SET category_id='$data[category_id]',blog_Title='$data[blog_Title]',short_des='$data[short_des]',long_des='$data[long_des]',StatusOfPublication='$data[StatusOfPublication]',blog_img='$imageUrl' WHERE id='$data[id]'";		 
if(mysqli_query(database::dbConnection(),$sql)){
			header('Location:manage-blog.php');
		 } else{
		     die('query problem'.mysqli_error(database::dbConnection()));
		 }



}
}
}
} else{
die('please chose an image file');
}

		 }else{
		 $sql="UPDATE bloginfo SET category_id='$data[category_id]',blog_Title='$data[blog_Title]',short_des='$data[short_des]',long_des='$data[long_des]',StatusOfPublication='$data[StatusOfPublication]' WHERE id='$data[id]'";
		  if(mysqli_query(database::dbConnection(),$sql)){
             header('Location:manage-blog.php');		     
		 } else{
		     die('query problem'.mysqli_error(database::dbConnection()));
		 }
		 }
		 
	 }
	 
	 
	 public function saveBlogInfo($data){
	 
	    $category_id=$data['category_id'];
		//echo '<pre>';
		//print_r($_FILES);
		//exit();
	     
	     
	     
	    
	     
	 
$directory='../assets/images/';
$imageUrl=$directory.$_FILES['blog_img']['name'];
$fileType=pathinfo($_FILES['blog_img']['name'],PATHINFO_EXTENSION);

$check=getimagesize($_FILES['blog_img']['tmp_name']);

if($check){
if(file_exists($imageUrl)){
die('This image already exit. please select another one');
}else{
if($_FILES['blog_img']['size']>3145728){
die('Your image size is too large. plz select within 3 mb');
}else{
if($fileType!='jpg' && $fileType!='png' && $fileType!='JPG'){
die('Image type is not supported');
}else{
move_uploaded_file($_FILES['blog_img']['tmp_name'],$imageUrl);
 $sql="INSERT INTO   bloginfo(category_id,blog_Title,short_des,long_des,blog_img,StatusOfPublication) VALUES('$category_id','$data[blog_Title]','$data[short_des]','$data[long_des]','$imageUrl','$data[StatusOfPublication]')";
		 if(mysqli_query(database::dbConnection(),$sql)){
				 $sms='Blog info saved successfully';
				 return $sms;
		 } else{
		     die('query problem'.mysqli_error(database::dbConnection()));
		 }



}
}
}
} else{
die('please chose an image file');
}

	 
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
}
?>