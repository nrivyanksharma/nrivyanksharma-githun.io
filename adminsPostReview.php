 <?php require_once("Include/DB.php");?>
 <?php require_once("Include/function.php")?>
 <?php require_once("Include/session.php") ?><!DOCTYPE html>
<html>
	<title>Posts</title>
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
					<h1>Blog Posts</h1>
				</div>				
				<div class="col-lg-3">
					<a href="addnewpost.php" class="btn btn-primary btn-block mb-2"> Add New Post</a> 
				</div>
				<div class="col-lg-3">
					<a href="Categories.php" class="btn btn-info btn-block mb-2"> Add New Category </a> 
				</div>
				<div class="col-lg-3">
					<a href="#" class="btn btn-warning btn-block mb-2">Add New Admin</a> 
				</div>
				<div class="col-lg-3">
					<a href="#" class="btn btn-success btn-block mb-2">Approved Comments</a> 
				</div>
			</div>
		</div>
	</header>
<!-- HEADER END -->

<!-- MAIN START -->
	<section class="container py-2 mb-2">
	<div class="row">	
		<div class="col-lg-12"> 
			<?php 
					echo showErrorMessage(); 
					echo showSuccessMessage();
				
			 ?>
			<table class="table table-striped table-hover" >
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th> Title</th>
						<th> Category</th>
						<th> Date&Time</th>
						<th> Author</th>
						<th> Banner</th>
						<th> Comments</th>
						<th> Action</th>
						<th> Live Preview</th>
					</tr>
				</thead>

	<?php 
		$sql= "SELECT * FROM posts";
		$stm = $connectingDB->query($sql);
		$sr=0;
		while($datarow=$stm->fetch()){
				$id 			=$datarow['id'];
				$category =$datarow['category'];
				$dateTime	=$datarow['dateTime'];
				$title 		=$datarow['title'];
				$admin 		=$datarow['author'];
				$image 		=$datarow['image'];
				$post 		=$datarow['post'];
				$sr++;
	 ?>
	 <tbody>
		 <tr>
		 	<td> <?php echo $sr;  ?> </td>
		 	<td>
		 	 <?php
			 	  if(strlen($title)>20){
			 	  	$title=substr($title,0,18).'..'; }
			 	  echo $title;
	 	   ?> 
		 	</td>
		 	<td>
		 	 	 <?php
			 	  if(strlen($category)>8){
			 	  	$category=substr($category,0,7).'..'; }
			 	  echo $category;
	 	   ?> 
		 	 </td>
		 	<td>
		 	 <?php
		 	 	if(strlen($dateTime)>10){ $dateTime=substr($dateTime,0,10).'..';	}
		 	  echo $dateTime;
		 	   ?>
	 	   </td>
		 	<td>
		 	 <?php
		 	if(strlen($admin)>8){ $admin = substr($admin,0,8).'..';}
		 	  echo $admin;
	 	   ?>
	 	   </td>
		 	<td> <img src="Upload/<?php echo $image ;?>" width="100px" height="50px" ></td>
		 	<td> Comments	</td>
		 	<td>
		 		<a href="editPost1.php?id=<?php echo $id; ?>"><span class="btn btn-warning">Edit</span></a>
		 		<a href="deletePost.php?id=<?php echo $id; ?>"><span class="btn btn-danger">Delete</span></a>
		 	</td>
		 	<td><a href="fullPost.php?id=<?php echo $id; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
		 </tr>
	</tbody>
	<?php 	} ?>
			</table>
		</div>
	</div>
	</section>

<!-- MAIN END -->

<!-- FOOTER START -->
	<div style="background:orange; height:10px"></div>
	<footer class="bg-dark text-white">
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