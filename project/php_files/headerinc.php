<?php 
include("connectinc.php"); 
session_start();
if(!isset($_SESSION["user_login"])){
$username="";
}
else{
$username = $_SESSION["user_login"];
}
?>
<html>
<body>
<head>
<title>Snist Connect</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src ="main.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div class="headerMenu">
<div id ="wrapper">
<div class ="logo">
<img src="logo.png"/>
</div>

<?php
if(!$username){
echo '<div id="menu">
	<b><a href="index.php"/>Home</a></b>
	<b><a href="index.php"/>Sign Up</a></b>
	<b><a href="index.php"/>Log In</a></b>
	<b><a href="aboutus.html">About Us</a></b>
</div>';
}
else{
echo '
<nav class=nav-bar>
<ul class="nav nav-pills" role="tablist">
  <li role="presentation" ><a href="'.$username.'">Profile</a></li>    
    <li role="presentation"><a href="my_messages.php">Inbox <span class="badge">i</span></a></li>
  <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <b>Notifications</b>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="account_settings.php"><span class="glyphicon glyphicon-cog"></span> Account Settings</a></li><br>
    <li><a href="my_pokes.php"><span class="glyphicon glyphicon-hand-left"></span> Pokes</a></li>	
	  <li><a href="friend_requests.php"><span class="glyphicon glyphicon-user"></span> FriendRequests</a></li><br>
    <li><a href="location.html"><span class="glyphicon glyphicon-map-marker"></span> GetLocation</a></li>	
	  <li><a href="like_mates.php"><span class="glyphicon glyphicon-eye-close"></span> LikeMates</a></li><br>
    <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>	
  </ul>
</div>
</ul>
</nav>
';
}
?>
<div id="wrapper">
</body>
</html>

