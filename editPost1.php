 <?php require_once("Include/DB.php");?>
 <?php require_once("Include/function.php")?>
 <?php require_once("Include/session.php") ?>
 <?php
  $searchQueryPerameter= $_GET['id'];


 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Edit Post</title>
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
					<h1>Add New Post</h1>
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
          $fetchQuery='SELECT * FROM posts WHERE id="$searchQueryPerameter"';
          $stmt= $connectingDB->query($fetchQuery);
          foreach($stmt as $datarow){
            $oldTitle= $datarow['title'];
            $oldCategory= $datarow['category'];
            $oldimage= $datarow['image'];
            $oldPostDescription= $datarow['post'];
          }
        ?>
				<form class="" action="editPost.php?id=" method="post" enctype="multipart/form-data">
					<div class="card bg-secondary text-light mb-3">
						<div class="card-body bg-dark">
							<div class="form-group">
								<label for="title">Post Title:</label> 
								<input class="form-control" type="text" name="Title" id="title" placeholder="Type title" value="">
							</div>
							<div class="form-group">
								<span class="field-info">Existing Category: </span><br>
								<label for="CategoryTile">Chose Category</label>
								<select class="form-control" type="text" name="category" id="CategoryTile">
									<?php 
											$query= 'SELECT categoryTitle,id FROM category';
											$stm = $connectingDB->query($query);
											while($dataRow= $stm->fetch()){
												$id= $dataRow["id"];
												$category=$dataRow["categoryTitle"]
									 ?>
									<option><?php echo $category ?></option>
								<?php } ?>
								</select>		
							</div>
							<div class="form-group">
								<div class="custom-file">
								<input id="selectImage" class="custom-file-input" type="file" name="image">
								<img src="Upload/ width="150px" height="100px">
									<span class="field-info"> </span>
								<lebel for="selectImage" class="custom-file-label">Select Image</lebel><div>
							</div>
							<div class="form-group">
								<lebel for="post"><span class="Fieldinfo">Post:</span></lebel>
									<textarea class="form-control	" id="post" name="postDescription" rows="8" cols="80" >	<</textarea>
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