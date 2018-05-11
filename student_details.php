<?php
include( './functions.php' );
if ( isset( $_SESSION[ 'name' ] ) && $_SESSION[ 'name' ] != 'admin' )
	redirect( './index.php' );

$checker = false;
$get_roll = "";
$get_std_name = "";
$get_std_fathers_name = "";
$get_std_mothers_name = "";
$get_std_branch = "";
$get_std_email = "";
$get_std_mobile = "";
$get_std_address = "";

if ( isset( $_GET[ 'roll' ] ) ) {
	$get_roll = $_GET[ 'roll' ];
	#echo("<script>alert(".$_GET['roll'].")</script>" );
	$checker = true;

	$conn = create_connection();
	$query = "SELECT * FROM student_info WHERE roll_num=".$get_roll;
	$result = $conn->query( $query );
	if($conn->affected_rows == 0) {
	    die ("<script> alert('No result found'); </script>");
    }
	$row = $result->fetch_assoc();
	$get_roll = $row['roll_num'];
	$get_std_name = $row[ 'name' ];
	$get_std_fathers_name = $row[ 'fathers_name' ];
	$get_std_mothers_name = $row[ 'mothers_name' ];
	$get_std_branch = $row[ 'branch_id' ];
	$get_std_email = $row[ 'email' ];
	$get_std_mobile = $row[ 'mobile' ];
	$get_std_address = $row[ 'address' ];
}

?>

    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./css/student_details.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <title>Untitled Document</title>
    </head>

    <body>
        <div class="st_det_main">
            <h1>Student Details</h1>
            <p style="font-weight: 600;">'<span style="color: indianred">*</span>' SHOWS REQUIRED FIELD</p>
            <form <?php if(!$checker){ echo( "action='./form_handler.php'"); }else { echo( "action='./update_entry.php'");}; ?>
                method="POST">

                <p class="required ">Students Enrollement Number
                    <input type="number " name="roll_num" <?php if($checker)echo( "value='".$get_roll. "'"); ?> required
                    <?php if($checker)echo( "readonly"); ?> ></p>

                <p class="required">Students Name
                    <input type="text" style="margin-left:100px;" <?php if($checker)echo( "value='".$get_std_name. "'"); ?> name="students_name" required></p>

                <p class="required">Fathers Name
                    <input type="text" style="margin-left:110px;" <?php if($checker)echo( "value='".$get_std_fathers_name. "'"); ?> name="fathers_name" required></p>
                <p class="required">Mothers Name
                    <input type="text" style="margin-left:100px;" <?php if($checker)echo( "value='".$get_std_mothers_name. "'"); ?> name="mothers_name" required></p>
                <p class="required">Branch
                    <select name="branch_id" style="margin-left:150px;">
					<option value="1" <?php if($checker){ if($get_std_branch=="1" )echo( "selected"); }?> > Civil Engineering </option>
					<option value="2" <?php if($checker){ if($get_std_branch=="2" )echo( "selected"); }?>> Chemical Engineering </option>
					<option value="3" <?php if($checker){ if($get_std_branch=="3" )echo( "selected"); }?>> Computer Science and Engineering </option>
					<option value="4" <?php if($checker){ if($get_std_branch=="4" )echo( "selected"); }?>> Electrical Engineering </option>
					<option value="5" <?php if($checker){ if($get_std_branch=="5" )echo( "selected"); }?>> Electronics and Communication Engineering </option>
					<option value="6" <?php if($checker){ if($get_std_branch=="6" )echo( "selected"); }?>> Mechanical Engineering </option>
				</select>
                </p>
                <p class="required">Admission Year
                    <input type="date" style="margin-left:100px;" name="admission_year" required <?php if($checker)echo( "readonly"); ?> ></p>
                <p class="required">Date of Birth
                    <input type="date" style="margin-left:120px;" name="dob" required <?php if($checker)echo( "readonly"); ?> ></p>
                <p>Email
                    <input type="email" style="margin-left:170px;" <?php if($checker)echo( "value='".$get_std_email. "'"); ?> name="email">
                </p>
                <p class="required">Mobile
                    <input type="number" style="margin-left:160px;" <?php if($checker)echo( "value='".$get_std_mobile. "'"); ?> name="mobile" required></p>
                <p class="required">Address
                    <input type="text" style="margin-left:150px;" <?php if($checker)echo( "value='".$get_std_address. "'"); ?> name="address" required></p>
                <p class="required"><input type="checkbox" name="checkek">I accept that all informations entered here are correct to my knowledge.<br> If found any descripency university can cancel my enrollement in the university </p>
                <p><input type="submit" name="submit" value="submit">
                </p>
            </form>
        </div>
    </body>

    </html>
