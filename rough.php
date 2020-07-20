<?php 
require_once('include/DB.php');

 ?>
<?php 
	$sql= 'SELECT category FROM posts where id=10';
	$data=$connectingDB->query($sql);
$datarow=$data->fetch();
	echo $datarow['category'];
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>rough</title>
 </head>
 <body>
 	<fieldset>

 	</fieldset>
 </body>
 </html>