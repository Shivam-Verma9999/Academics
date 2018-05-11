<?php 
session_start();
include("functions.php");
if ($_SESSION['name'] != 'admin')
	redirect("./index.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/admin_home.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
    <meta charset="UTF-8">
    <title>Home</title>
</head>

<body>
    <div class="main">
        <div class="side_menu">
            <div class="img"> </div>
            <div class="menu">
                <ul>
                    <li onClick="open_url('./all_entries.php')">
                        <span>All Entries</span>
                        <div class="liner"></div>
                    </li>
                    <li onClick="open_url('./student_details.php')"> <span>New Admission</span>
                        <div class="liner"></div>
                    </li>
                    <li onClick="view();"> <span>edit student branch/info</span>
                        <div class="liner"></div>
                    </li>
                    <li onclick="open_url('./branch_info.html')"> <span> Branch info</span>
                        <div class="liner"></div>
                    </li>

                </ul>
            </div>
            <div class="button" onClick="window.location='./logout.php';"> Log out </div>
        </div>
        <div class="content">
            <div class="frame">
                <iframe src="all_entries.php" frameborder="0"> </iframe>
            </div>
        </div>
    </div>
    <div class="student_info_container" onclick="hide();"></div>
    <div class="student_info">
        <center style="margin-top:5px; margin-bottom: -20px;">
            Student Roll number
        </center>
        <input type="number" id="edit_roll" placeholder="Roll number/Registration Number">
        <div class="button bottom" onClick="edit_entry()">Search</div>
    </div>

</body>
<script>
    var main = document.querySelector(".student_info_container");
    var frame = document.querySelector("iframe");
    var student_info = document.querySelector(".student_info");

    function open_url(url_path) {
        frame.attributes.src.nodeValue = url_path;
    }

    function view() {
        main.style.zIndex = "2";
        main.style.opacity = "1";
        student_info.style.zIndex = '3';
        student_info.style.opacity = '1';
    }

    function hide() {
        main.style.zIndex = "-1";
        main.style.opacity = "0";
        setTimeout(function() {
            student_info.style.zIndex = '-1'
        }, 400);
        student_info.style.opacity = '0';
    }

    function edit_entry() {
        var num = document.querySelector('#edit_roll');
        if (num.value == "")
            num.value = "0";
        open_url('./student_details.php?roll=' + num.value);
        num.value = "";
        hide();
    }

</script>

</html>
