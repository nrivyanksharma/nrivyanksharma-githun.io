 <?php require_once("Include/DB.php");?>
 <?php require_once("Include/function.php")?>
 <?php require_once("Include/session.php") ?>
 <?php
 	$admin='AK Pathak';
 	$date= currentDateTime(); //getting current date function defined in function.php

 	if( isset($_POST['submitButton'])) {
 		$category=$_POST['Title'];
 		if(empty($category)){
 			$_SESSION['errorMessage']= 'All fields must be filled out!';
 		}elseif(strlen($category)<2){
 			$_SESSION['errorMessage']='Category title should be grater that 2 characters.';
 		}elseif(strlen($category)>50){
 			$_SESSION['errorMessage']='Category title should be less than 50 characters.';
 		}else{
 			$sql= "INSERT INTO category (`categoryTitle`, `authorName`, `dateTime`) VALUES (:Title,:Author,:currentDate)";
 			$stm=$connectingDB->prepare($sql);
 			$stm->bindValue(':Title',$category);
 			$stm->bindValue(':Author',$admin);
 			$stm->bindValue(':currentDate',$date);
			 $execute = $stm->execute();

 			/* USING MYSQLI EXTENSTION
 			$query= "INSERT INTO category(title,author,date_time) VALUES('$category','$admin','$date')";
 			$process= mysqli_connect('localhost','root','','cms');
 			$result=mysqli_query($process,$query);*/
 			if($execute){
 				$_SESSION['successMessage']= 'Category add Successfully!';
 				redirectTo('Categories.php');
 			}else{
 				$_SESSION['errorMessage']= 'Something went wrong!';
 			}
 		// redirectTo("Categories.php");
 	}
 }

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Categories</title>
	<link rel="stylesheet" type="text/css" href="Dependencies/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	<style>
		body{
			margin:0;
			padding:0;
		}
	</style>
</head>
<body>
<!-- NAVBAR START -->
	<div style="background:orange; height:10px"></div>
	<nav class="navbar navbar-expand-lg bg-dark">
		<div class="container">
			<a href="#" class="navbar-brand">Ak PATHAK</a>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a href="MyProfile.php" class="nav-link">My Profile</a>
				</li>
				<li class="nav-item">
					<a href="Dashboard.php" class="nav-link">Dashboard</a>
				</li>
				<li class="nav-item">
					<a href="Posts.php" class="nav-link">Posts</a>
				</li>
				<li class="nav-item">
					<a href="Categories.php" class="nav-link">Categories</a>
				</li>
				<li class="nav-item">
					<a href="Admins.php" class="nav-link">Manage Admins</a>
				</li>
				<li class="nav-item">
					<a href="Comments.php" class="nav-link">Comments</a>
				</li>
				<li class="nav-item">
					<a href="Blog.php?page1" class="nav-link">Live Blog</a>
				</li>
			</ul>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="Logout.php" clsas="nav-link text-danger">Logout</a>
				</li>
			</ul>
 		</div>
	</nav>
	<div style="background:orange; height:10px"></div>
<!-- NAVBAR END -->

<!-- HEADER  -->
	<header class="bg-dark text-white py-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>MANAGE CATEGORIES</h1>
				</div>
			</div>
		</div>
	</header>
<!-- HEADER END -->

<!-- MAIN START  -->


	<section class="container py-2 mb4">
		<div class="row">
			<div class="offset-lg-1 col-lg-10" style="min-height: 470px">
				<?php 
					echo showErrorMessage(); 
					echo showSuccessMessage();
				?>
				<form class="" action="Categories.php" method="post">
					<div class="card bg-secondary text-light mb-3">
						<div class="card-header">
							<h1>Add new category</h1>
						</div>
						<div class="card-body bg-dark">
							<div class="form-group">
								<label for="title">Category title:</label>
								<input class="form-control" type="text" name="Title" id="title" placeholder="Type title">
							</div>
							<div class="row" >
								<div class="col-lg-6 mb-2">
									<a href="dashboard.php" class="btn btn-warning  btn-block">Back To The Dashboard</a>
								</div>
								<div class="col-lg-6 mb-2">
									<button class="btn btn-success btn-block" type="submit" name="submitButton">Publish</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		
	</section>
<!-- MAIN END -->

<!-- FOOTER START -->
	<div style="background:orange; height:10px"></div>
	<footer class="bg-dark text-white"  >
		<div class="container">
			<div class="row">
				<div class="col">
					<p class="lead text-center"> Theme By | AK PATHAK| &copy; ---right reserved</p>
				</div>
			</div>
		</div>
		
	</footer>
	<div style="background:orange; height:10px"></div>
<!-- FOOTER END -->
</body>
</html>