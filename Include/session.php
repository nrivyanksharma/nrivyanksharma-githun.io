<?php 
	session_start();
	function showErrorMessage(){
		if(isset($_SESSION['errorMessage'])){
			// $output="<div class=\" alert alert-danger\">".htmlentities($_SESSION['errorMessage'])."</div>";
			$output="<div class=\" alert alert-danger\">";
			$output.=htmlentities($_SESSION['errorMessage']);
			$output.="</div>";
			$_SESSION['errorMessage']=null;
			return $output;
		}
	}
	function showSuccessMessage(){
		if(isset($_SESSION['successMessage'])){
			$output="<div class=\" alert alert-success\">".htmlentities($_SESSION['successMessage'])."</div>";
			$_SESSION['successMessage']=null;
			return $output;
		}
		
	}
 ?>
