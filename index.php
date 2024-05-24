<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<?php ?>
	<?php include 'header.php' ?>
	<?php
	include 'db_connect.php';
	$qry = $conn->query("SELECT * from site_settings limit 1");
	if($qry->num_rows > 0){
		foreach($qry->fetch_array() as $k => $val){
			$meta[$k] = $val;
		}
	}
	 ?>

  
</head>

<body>

 <?php include 'topbar.php' ?>




  <main id="main">

   <?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            include $page.'.php';

            ?>

  </main>
  

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  

</body>

</html>