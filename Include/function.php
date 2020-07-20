<?php 
	function redirectTo($redirectLocation){
		header('Location:'.$redirectLocation);
		exit();
	}

	function currentDateTime(){
		date_default_timezone_set('Asia/Kolkata');
		$formate= 'M d, Y  h:i:s A';
		$currentTime= time();
		$date= date($formate, $currentTime);
		return $date;
	}
?>