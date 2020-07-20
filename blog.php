<?php require_once("Include/DB.php");?>
 <?php require_once("Include/function.php")?>
 <?php require_once("Include/session.php") ?> <!DOCTYPE html>
<html>
	<title>Blog Page</title>
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
					<a href="Blog.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="Blog.php" class="nav-link">Blog</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Features</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Contact Us</a>
				</li>
				<li class="nav-item">
					<a href="Blog.php" class="nav-link">About Us</a>
				</li>
			</ul>
			<ul class="navbar-nav">
				<form class="form-inline">
					<div class="form-group">	
							<input class="form-control" type="text" name="search" placeholder="	Search here">	</input>
							<button class="btn btn-primary ml-2" name="searchButton">Go	</button>
					</div>	

				</form>
			</ul>
 		</div>
	</nav>
	<div style="background:orange; height:10px"></div>
<!-- NAVBAR END -->

<!-- HEADER  -->
 <div class="container">	
 		<div class="row mt-4">	
 			<!-- MAIN AREA -->
 				<div class="offset-sm-1 col-sm-8 " >
 						<h1>Complete responsive blog</h1>
 						<h1 class="lead">Complete blog by using PHP by AK Pathak</h1>
				</div>
				<?php
				 if(isset($_GET['searchButton'])){
					$search= $_GET['search'];
					$sql="SELECT * FROM posts WHERE dateTime LIKE :Search 
					OR title LIKE :Search
					OR category LIKE :Search
					OR post LIKE :Search";
					$stm=$connectingDB->prepare($sql);
					$stm->bindValue(':Search',"%".$search."%");
					$stm->execute();
				}else{
					$query = "SELECT * FROM posts ORDER BY id DESC";
					$stm=$connectingDB->query($query);
				}
					 while($data=$stm->fetch()){
					 	$id=$data['id'];		
					 	$category=$data['category'];
					 	$dateTime=$data['dateTime'];
					 	$author=$data['author'];
					 	$image=$data['image'];
					 	$post=$data['post'];
							$title =$data['title'];
 					?>
				 <div class="offset-sm-1 col-sm-7 ">
 					<?php echo showErrorMessage(); ?>
				 		<div class="card">
				 			<img src="Upload/<?php echo htmlentities($image); ?>" style="max-height:450px;" class="card-image-top img-fluid">
				 			<div class="card-body">
				 					<h4 class="card-titile"><?php echo htmlentities($title) ?></h4>
				 					<small class="text-muted"><?php echo htmlentities($author); ?> on <?php echo htmlentities($dateTime); ?></small>
				 					<span style="float:right" class="badge badge-dark text-light">Comments 20</span>
				 					<hr>
				 					<p class="card-text"><?php 
				 								if(strlen($post)>150){
				 									$post=substr($post,0,150);
				 								}
						 						echo htmlentities($post).'...'; 
				 					?></p>
				 			</div>
				 			<a href="fullPost.php?id=<?php echo $id; ?>">
				 				<span  style="float:right;" class="btn btn-info mb-2">Read more >></span>
				 			</a>
				 		</div>
				</div> 
 				<!-- MAIN AREA END -->

 				<!-- MAIN SIDE AREA -->
 				<div class="col-sm-4 gray" >  </div>
 				<!-- MAIN SIDE AREA END -->
 				<?php }  ?>
 		</div>	

 </div>	
<!-- HEADER END -->
<BR>
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