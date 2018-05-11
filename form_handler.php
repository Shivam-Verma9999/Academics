<?php
include('./functions.php');
if(isset($_POST['submit']) ){
	$name = $_POST['students_name'];
	$roll_num = $_POST['roll_num'];
	$fathers_name = $_POST['fathers_name'];
	$mothers_name = $_POST['mothers_name'];
	$dob = $_POST['dob'];
	$dob = date('Y-m-d', strtotime($dob));
	$admission_year = $_POST['admission_year'];
	$admission_year = date('Y-m-d', strtotime($admission_year));
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$branch_id = (int)$_POST['branch_id'];
	$query = "INSERT INTO student_info values ( {$roll_num}, '{$name}', {$mobile}, '{$email}', '{$dob}',  
	'{$fathers_name}', '{$mothers_name}', '{$address}', {$branch_id}, '{$admission_year}') ";
	
	$conn = create_connection();
	$result = $conn->query($query);
	#echo($result);
	redirect('./all_entries.php');
}
?>