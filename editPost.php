 <?php require_once("Include/DB.php");?>
 <?php require_once("Include/function.php")?>
 <?php require_once("Include/session.php") ?>
 <?php
 	$admin='AK Pathak';
 	$date= currentDateTime(); //getting current date function defined in function.php.
	$searchQueryPerameter= $_GET['id'];
//Grabing the submitButton(publish) and check wether it is empty of not.
 	if( isset($_POST['submitButton'])) {
 		// Grabing all the input fields.
 		$postTitle=$_POST['Title'];
 		$category=$_POST['category'];
 		$image= $_FILES['image']['name'];
 		$postText= $_POST['postDescription'];
		$targate='Upload/'.basename($image); //targeting the path for saving the image. 
		//Doing some validation on the input data.
 		if(empty($postTitle)){
 			$_SESSION['errorMessage']= 'Post title must be filled out!';
 		}elseif(strlen($postTitle)<5){
 			$_SESSION['errorMessage']='Post title should be grater that 5 characters.';
 		}elseif(strlen($postText)>1000){
 			$_SESSION['errorMessage']='Post description should be less than 1000 characters.';
 		}else{
 			// Query to update data into the posts table.
 			if(!empty($image)){
 			$query= 'UPDATE posts SET title="$postTitle" category="$category" image="$image" post="$postText" WHERE id="$searchQueryPerameter"';
 			}else{
 				$query='UPDATE posts SET title="$title" category="$category" post="$postText" WHERE id="$searchQueryPerameter"';
 			}
 			$execute=$connectingDB->query($query);
 			move_uploaded_file($_FILES['image']['tmp_name'],$targate);//moving the image to the target folder to save the uploaded image.
			 var_dump($execute);
 			// Checking that the user has published its post successfully or not and creating success and error message using  $_SESSION[]	
 			// if($execute){
 			// 	$_SESSION['successMessage']= 'post add Successfully!';
 			// 	redirectTo('adminsPostReview.php');
 			// }else{
 			// 	$_SESSION['errorMessage']= 'Something went wrong!';
 			// 	redirectTo('adminsPostReview.php');
 			// }
 	}
 }

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
					 //show the errorMessage and successmessage when the user publish the post using these methods. these methods the defined in session.php file.  

					$query= "SELECT * FROM posts WHERE id='$searchQueryPerameter'";
					$stm= $connectingDB->query($query);
					while($dataRow=$stm->fetch()){
						$titileToBeUpdated=$dataRow['title'];
						$categoryToBeUpdated=$dataRow['category'];
						$imageToBeUpdated=$dataRow['image'];
						$postToBeUpdated=$dataRow['post'];
					}
				?>
				<form class="" action="editPost.php?id=<?php echo $searchQueryPerameter; ?>" method="post" enctype="multipart/form-data">
					<div class="card bg-secondary text-light mb-3">
						<div class="card-body bg-dark">
							<div class="form-group">
								<label for="title">Post Title:</label> 
								<input class="form-control" type="text" name="Title" id="title" placeholder="Type title" value="<?php echo $titileToBeUpdated; ?>">
							</div>
							<div class="form-group">
								<span class="field-info">Existing Category: </span><?php echo $categoryToBeUpdated; ?><br>
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
								<img src="Upload/<?php echo $imageToBeUpdated; ?>" width="150px" height="100px">
									<span class="field-info"> <?php echo $imageToBeUpdated; ?></span>
								<lebel for="selectImage" class="custom-file-label">Select Image</lebel><div>
							</div>
							<div class="form-group">
								<lebel for="post"><span class="Fieldinfo">Post:</span></lebel>
									<textarea class="form-control	" id="post" name="postDescription" rows="8" cols="80" >	<?php echo $postToBeUpdated; ?></textarea>
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