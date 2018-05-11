<?php 
session_start();
include("functions.php");
if ( isset($_SESSION['name']) && $_SESSION['name'] == 'admin')
	redirect("./admin_home.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Anton">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" type="text/css" href="css/index.css">
<title>Document</title>
</head>
<body>
<div class="logo"> </div>
<div class="main">
  <div class="background"> <span style="text-shadow: rgba(46, 61, 73, 0.2) 6px 6px ;">ACADEMICS</span><br>
    <span style="font-size: 30px; display: inline-block; margin-top: 40px; position: absolute; color: #AB47BC;" >Madan Mohan Malaviya University of Technology</span> </div>
  <div class="form">
    <div class="main" style=" position:absolute; right: 0;">
      <div class="background" style="margin-top: -21px; margin-left: 15px; color: magenta;"> <span style="text-shadow: rgba(46, 61, 73, 0.2) 6px 6px ;">ACADEMICS</span><br>
        <span style="font-size: 30px; display: inline-block; margin-top: 40px; position: absolute; color: #AB47BC;" >Madan Mohan Malaviya University of Technology</span> </div>
    </div>
    <div class="form_content">
      <form action="login.php" method="post">
        <span style="font-family: Open Sans; font-size: 45px;display: inline-block; margin-bottom:20px; ">Login</span><br>
        username<br>
        <input type="text" name="username" required>
        <br>
        <br>
        password<br>
        <input type="password" name="password" required>
        <br>
        <br>
        <input type="submit" name="submit">
      </form>
    </div>
  </div>
</div>
</body>
</html>