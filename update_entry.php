<?php

include('./functions.php');
if(isset($_POST['submit']) ){
	$name = $_POST['students_name'];
	$roll_num = $_POST['roll_num'];
	$fathers_name = $_POST['fathers_name'];
	$mothers_name = $_POST['mothers_name'];
	
	
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$branch_id = (int)$_POST['branch_id'];
	$query = "UPDATE student_info SET name = '{$name}', mobile= {$mobile}, email= '{$email}', fathers_name ='{$fathers_name}', mothers_name = '{$mothers_name}', address= '{$address}',branch_id = {$branch_id} WHERE roll_num = {$roll_num}";
	
	$conn = create_connection();
	$result = $conn->query($query);
	#echo($result);
	#echo(mysqli_errno($conn));
	redirect('./all_entries.php');
}

?>