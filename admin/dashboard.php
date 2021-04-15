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
</body>
</html>