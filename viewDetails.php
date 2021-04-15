
<?php
require_once 'vendor/autoload.php';
     $application=new App\classes\Application();
	 $result=$application->getAllPublishedBlogInfo();
	 if(isset($_GET['find'])){
	 $id=$_GET['id'];
	 $queryResult=$application->getAllPublishedBlogInfoById($id);
	 	$blgInfoById=mysqli_fetch_assoc($queryResult);


	 
	 }
?>









<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Heroic Features - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/heroic-features.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Features -->
    <div class="row text-center">
      <div class="col-lg-8 col-md-10 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="app/<?php echo $blgInfoById['blog_img'];?>" alt="">
          <div class="card-body">
            <h4 class="card-title"><?php echo $blgInfoById['blog_Title'];?></h4>
            <p class="card-text"><?php echo $blgInfoById['short_des'];?></p>
            <h4 class="card-text"><?php echo $blgInfoById['long_des'];?></h4>
          </div>
        </div>
      </div>
	  

     

     
     

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/bootstrap.js"></script>

</body>

</html>
