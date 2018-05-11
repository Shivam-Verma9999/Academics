
<?php
	
	function redirect(string $url){
		ob_start();
		header("Location: ".$url);
		ob_end_flush();
		die();
	}
	
	function create_connection(){
		$conn = new mysqli('localhost', 'root', 'root', 'academics');
		if($conn->connect_error){
			return null;
		}
		return $conn;
	}
	
	
	
?>