<?php
/**
 * Created by PhpStorm.
 * User: Shivam Verma
 * Date: 2/21/2018
 * Time: 7:15 PM
 */

include('./functions.php');
if(isset($_GET['remove_roll'])) {
    $conn = create_connection();
    $query = 'DELETE FROM student_info WHERE roll_num="'.$_GET['remove_roll'].'"';
    $result = $conn->query($query);
    echo ($conn->affected_rows);
    #redirect('./all_entries.php');
}