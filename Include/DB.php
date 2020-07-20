<?php 
	$DSN='mysql:host=localhost; dbname=cms-v2'; //data source network
	$connectingDB= new PDO($DSN,'root','');
?>
<?php
	// try{
	// 	$DNS='mysql:host=localhost; dbname=cms';
	// 	$connectingDB = new PDO($DNS,'root','');
	// 	$connectingDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// 	echo 'connented successfully';
	// }catch(PDOException $e){
	// 	echo "connection failed: ".$e->getMessage();
	// }
 ?>