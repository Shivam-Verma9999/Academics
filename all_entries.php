<?php 
session_start();
include("functions.php");

if (isset($_SESSION['name']) && $_SESSION['name'] != 'admin')
	redirect("./index.php");


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <link rel="stylesheet" href="./css/all_entries.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <script>
        function edit_entry(num) {
            window.location = './student_details.php?roll=' + num;
        }

        function remove_entry(num, index) {
            if (confirm("Remove student with ROLL NUMBER = " + num)) {
                // window.location = './remove_entry.php?remove_roll=' + num;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var text = this.responseText;
                        if (parseInt(text) != 0) {
                            var row = document.querySelectorAll('tr');
                            row[(parseInt(index))].parentNode.removeChild(row[(parseInt(index))]);
                        } else {
                            alert("Error Occured while removing. ");
                        }
                    }
                };
                xhttp.open("GET", "./remove_entry.php?remove_roll=" + num, true);
                xhttp.send();
            }
        }

    </script>

</head>

<body>

    <table>
        <thead>
            <tr>
                <th>serial</th>
                <th>Name</th>
                <th>Roll number</th>
                <th>father's name</th>
                <th>Mother's name</th>
                <th>semester</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php 
				
				$conn = create_connection();
				$query = "SELECT name, roll_num, fathers_name, mothers_name, timestampdiff(month, admission_year, current_timestamp) as month_count FROM student_info ";
				$result = $conn->query($query);
			$counter = 1;
				while($row = $result->fetch_assoc() ){
			?>
            <tr>
                <td>
                    <?php echo($counter); ?>.</td>
                <td>
                    <?php echo($row['name']); ?>
                </td>
                <td>
                    <?php echo($row['roll_num']); ?>
                </td>
                <td>
                    <?php echo($row['fathers_name']); ?>
                </td>
                <td>
                    <?php echo($row['mothers_name']); ?>
                </td>
                <td>
                    <?php $sem = (int)($row['month_count']/6); $sem = (int)$row['month_count']%6 == 0? $sem : $sem+ 1; echo($sem);?>
                </td>
                <td>
                    <img src="./images/delete.svg" height="18" width="18" alt="delete" onclick="remove_entry(<?php echo($row['roll_num']); ?>, <?php echo($counter); ?>)">
                    <img src="./images/edit_icon.svg" height="20" width="20" alt="edit" onClick="edit_entry(<?php echo($row['roll_num']); ?>)">
                </td>
            </tr>
            <?php $counter+=1; } ?>
        </tbody>
    </table>
</body>

</html>
