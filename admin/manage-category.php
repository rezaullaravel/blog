<?phprequire_once '../vendor/autoload.php';$login=new App\classes\Login();session_start();if($_SESSION['id']==null){header('Location:index.php');}if(isset($_GET['logout'])){     $login->adminLogout();}if(isset($_GET['manage'])){     $x=$login->viewGoryInfo();		 }$sms='';if(isset($_GET['delete'])){     $id=$_GET['id'];	 $sms=$login->deleteGoryInfoById($id);}?><!doctype html><html><head><title>dashboard</title></head><body><?phpinclude('menu.php');?><div class="container" style="margin-top:10px;">     <div class="row">	     <div class="col-sm-10 mx-auto">		     	     <div class="card">		     <div class="card-body">			 <h1 style="color:navyblue; margin-left:150px;"><?php echo $sms;?></h1><table class="table table-dark">  <thead>    <tr>      <th scope="col">SL NO</th>      <th scope="col">Category Name</th>      <th scope="col">Category Description</th>      <th scope="col">Publication Status</th>      <th scope="col">Action</th>    </tr>	  <?php while($rows=mysqli_fetch_assoc($x)){?>  </thead>  <tbody>    <tr>      <th scope="row"><?php echo $rows['id'];?></th>      <td><?php echo $rows['goryName'];?></td>      <td><?php echo $rows['explanation'];?></td>      <td><?php echo $rows['statusStyle'];?></td>      <td>	     <a href="edit-category.php?id=<?php echo $rows['id'];?>">Edit</a>||	     <a href="?delete=true&id=<?php echo $rows['id'];?>">Delete</a>	  </td>    </tr>	<?php }?>        </tbody></table>			 </div>		 </div>		 </div>	 </div></div></body></html>