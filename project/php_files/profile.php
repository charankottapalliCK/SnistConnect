<?php
include("headerinc.php");
if(isset($_GET['u'])){
$username = mysql_real_escape_string($_GET['u']);
if(ctype_alnum($username)){
$check = mysql_query("SELECT username,first_name FROM user_details WHERE username='$username'");
if(mysql_num_rows($check)===1){
$get = mysql_fetch_assoc($check);
$username = $get['username'];
$firstname = $get['first_name'];
}
else{
echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/project/index.php\">";
exit();
}
}
}

$post=@$_POST['post'];
	if($post!=""){
	$user = $_SESSION["user_login"];
	$date_added = date("d-m-Y");
	$added_by = $user;
	$user_posted_to = $username;

	$sqlCommand = "INSERT INTO posts VALUES('','$post','$date_added','$added_by','$user_posted_to')";
	$query = mysql_query($sqlCommand) or die(mysql_error());
	}
	
  $check_pic = mysql_query("SELECT profile_pic FROM user_details WHERE username='$username'");
  $get_pic_row = mysql_fetch_assoc($check_pic);
  $profile_pic_db = $get_pic_row['profile_pic'];
  if ($profile_pic_db == "") {
  $profile_pic = "pr.jpg";
  }
  else
  {
  $profile_pic = "userdata/profile_pics/".$profile_pic_db;
  }
  
?>
<div class="postForm">	
<form action="<?php echo $username; ?>" method="POST">
<textarea id="post" name="post" rows="7" cols="70" placeholder="What's going on?....say your friends"></textarea><br>
<input type="submit" name="send" value ="Post" style="background-color:#006FC4; float :right; border:1px solid #666;><br>
</form>
</div>
</div>
<div class="profilePosts">
<?php
if (isset($_POST['sendmsg'])) {
 header("Location: send_msg.php?u=$username"); 
}
?>
<?php include("homepage.php"); ?>

<?php


/*$getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10") or die(mysql_error());
while($row = mysql_fetch_assoc($getposts)){
$id = $row['id'];
$body = $row['body'];
$date_added = $row['date_added'];
$added_by = $row['added_by'];
$user_posted_to = $row['user_posted_to'];
echo "<div class = 'posted_by'><a href = '$added_by'>$added_by</a> - $date_added - </div><br>&nbsp;&nbsp;$body<br /><br/><hr/>";
}*/
?>

<?php
$errorMsg ="";
if(isset($_POST['addfriend'])){
$friend_request = $_POST['addfriend'];
$user_from = $username;
$user_to = $_SESSION["user_login"];
if($user_to == $username)
{
$errorMsg = "you cant send friend request to yourself<br />";
}
else{
$create_request = mysql_query("INSERT INTO friend_requests VALUES('','$user_to','$user_from')");
$errorMsg = "your FriendRequest is sent";
}
}
else{
}
?>

</div>
<img src="<?php echo $profile_pic; ?>" height="256" width="200" alt="<?php echo $username; ?>'s Profile" title="<?echo $username; ?>'s Profile" />
<br />
<form action="<?php echo $username; ?>" method ="POST">
<?php
$fiendsArray ="";
$countFriends ="";
$friendsArray1 ="";
$addAsFriend ="";
$selectFriendsQuery = mysql_query("SELECT friend_array FROM user_details WHERE username='$username'");
$friendRow = mysql_fetch_assoc($selectFriendsQuery);
$friendArray = $friendRow['friend_array'];
if($friendArray!=""){
$friendArray =explode(",",$friendArray);
$countFriends = count($friendArray);
$friendsArray1 =array_slice($friendArray,0,12);
$i= 0;
$user =$_SESSION["user_login"];
if (in_array($user,$friendArray)) {
 $addAsFriend = '<input type="submit" name="removefriend" value="UnFriend">';
}
else{
$addAsFriend ='<input type ="submit" name ="addfriend" value="Add Friend">';
}
echo $addAsFriend;
}
else{
$addAsFriend = '<input type ="submit" name ="removefriend" value="Remove Friend">';
echo $addAsFriend;
}

if (@$_POST['removefriend']) {
  $user =$_SESSION["user_login"];
  $add_friend_check = mysql_query("SELECT friend_array FROM user_details WHERE username='$user'");
  $get_friend_row = mysql_fetch_assoc($add_friend_check);
  $friend_array = $get_friend_row['friend_array'];
  $friend_array_explode = explode(",",$friend_array);
  $friend_array_count = count($friend_array_explode);
  
  $add_friend_check_username = mysql_query("SELECT friend_array FROM user_details WHERE username='$username'");
  $get_friend_row_username = mysql_fetch_assoc($add_friend_check_username);
  $friend_array_username = $get_friend_row_username['friend_array'];
  $friend_array_explode_username = explode(",",$friend_array_username);
  $friend_array_count_username = count($friend_array_explode_username);
  
  $usernameComma = ",".$username;
  $usernameComma2 = $username.",";
  
  $userComma = ",".$user;
  $userComma2 = $user.",";
  
  if (strstr($friend_array,$usernameComma)) {
   $friend1 = str_replace("$usernameComma","",$friend_array);
  }
  else
  if (strstr($friend_array,$usernameComma2)) {
   $friend1 = str_replace("$usernameComma2","",$friend_array);
  }
  else
  if (strstr($friend_array,$username)) {
   $friend1 = str_replace("$username","",$friend_array);
  }

  if (strstr($friend_array,$userComma)) {
   $friend2 = str_replace("$userComma","",$friend_array);
  }
  else
  if (strstr($friend_array,$userComma2)) {
   $friend2 = str_replace("$userComma2","",$friend_array);
  }
  else
  if (strstr($friend_array,$user)) {
   $friend2 = str_replace("$user","",$friend_array);
  }

  $friend2 = "";

  $removeFriendQuery = mysql_query("UPDATE user_details SET friend_array='$friend1' WHERE username='$user'");
  $removeFriendQuery_username = mysql_query("UPDATE user_details SET friend_array='$friend2' WHERE username='$username'");
  echo "Friend Removed ...";
  header("Location: $username");
}

if (@$_POST['poke']) {
  $check_if_poked = mysql_query("SELECT * FROM pokes WHERE user_to='$username' && user_from='$user'");
  $num_poke_found = mysql_num_rows($check_if_poked);
  if ($num_poke_found == 1) {
   echo "You must wait to be poked back.";
  }
  else
  if ($username == $user) {
  echo "You cannot Poke yourself.";
  }
  else
  {
 $poke_user = mysql_query("INSERT INTO pokes VALUES ('','$user','$username')");
 echo "$username has been poked.";
  }
}



?>
<script>
    alert("<?php echo $errorMsg; ?>");
</script>
<input type="submit" name="poke" value="Poke">
<input type="submit" name="sendmsg" value="Send Message">
</form>
<div class="textHeader"><H1><i><u><?php echo $username; ?>'s Profile</u></i></H1> </div>
<div class="profileLeftSideContent">
<form action="myupload.php" method="POST">
<input type="submit" name="View Albums" value="<?php echo $username; ?>'s Albums"/>
</form>
<h1><i><u><?php echo $username; ?>'s Status</u></i></h1>
<?php
$about_query = mysql_query("SELECT bio FROM user_details WHERE username='$username'");
$get_result= mysql_fetch_assoc($about_query);
$about_user = $get_result['bio'];

echo $about_user;
?>
</div>
<div class="textHeader"><h1><i><u><?php echo $username; ?>'s Friends</u></i></h1></div>
<div class="profileLeftSideContent">
<?php
if($countFriends != 0)
foreach($friendsArray1 as $key=> $value){
$i++;
$getFriendQuery = mysql_query("SELECT * FROM user_details WHERE username='$value' LIMIT 1");
$getFriendRow = mysql_fetch_assoc($getFriendQuery);
$friendUsername= $getFriendRow['username'];
$friendProfilePic = $getFriendRow['profile_pic'];

if($friendProfilePic =="")
{
echo "<a href='$friendUsername'><img src='pr.jpg' alt=\"$friendUsername's Profile\" title=\"$friendUsername's Profile\" height='40' width='30' style='padding-right: 6px;'></a>";
}
else{
echo "<a href='$friendUsername'><img src = 'userdata/profile_pics/$friendProfilePic' alt=\"$friendUsername's Profile\" title=\"$friendUsername's Profile\" height='40' width='30' style='padding-right: 6px;'></a>";
}
}
else{
echo $username." has no friends";
}
?>
</div>
<div class= "search_box">
<form action="search.php" method="POST" id="search">
<input type="text" name="q" size="40" placeholder="Find Friends in SnistConnect"/>
<input type="hidden" name="search" value ="search"/>
</form>
</div>