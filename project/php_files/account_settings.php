<?php
include("headerinc.php");
if($username){
}
else
{
die("you must log in to view profile");
}
?>
<?php
$senddata=@$_POST['senddata'];
$old_password = strip_tags(@$_POST['oldpassword']);
$new_password = strip_tags(@$_POST['newpassword']);
$repeat_password = strip_tags(@$_POST['newpassword1']);
if ($senddata) {
  $password_query = mysql_query("SELECT * FROM user_details WHERE username='$username'");
  while ($row = mysql_fetch_assoc($password_query)) {
        $db_password = $row['password'];
        $old_password_md5 = md5($old_password);

        if ($old_password_md5 == $db_password) {
         if ($new_password == $repeat_password) {
            if (strlen($new_password) <= 4) {
			?>
<div class="alert alert-danger">
    <strong>Oppps</strong> Sorry! But your password must be more than 4 character long!
  </div>
<?php
            }
            else
            {
            $new_password_md5 = md5($new_password);
           $password_update_query = mysql_query("UPDATE user_details SET password='$new_password_md5' WHERE username='$username'");
		   	?>
<div class="alert alert-danger">
    <strong>Oppps</strong>Success! Your password has been updated!
  </div>
<?php
            }
         }
         else
         {
		   	?>
<div class="alert alert-danger">
    <strong>Oppps</strong>Your two new passwords don't match!
  </div>
<?php
         }
        }
        else
        {
		 	?>
<div class="alert alert-danger">
    <strong>Oppps</strong>The old password is incorrect!
  </div>
<?php
        }
  }
   }
  else
  {
   echo "";
  }
  

  $updateinfo = @$_POST['updateinfo'];

  $get_info = mysql_query("SELECT first_name, last_name, bio FROM user_details WHERE username='$username'");
  $get_row = mysql_fetch_assoc($get_info);
  $db_firstname = $get_row['first_name'];
  $db_last_name = $get_row['last_name'];
  $db_bio = $get_row['bio'];

  if ($updateinfo) {
   $firstname = strip_tags(@$_POST['fname']);
   $lastname = strip_tags(@$_POST['lname']);
   $bio = @$_POST['bio'];


   if (strlen($firstname) < 3) {
   ?>
<div class="alert alert-danger">
    <strong>Oppps</strong>Your first name must be 3 more more characters long.
  </div>
<?php
   }
   else
   if (strlen($lastname) < 5) {
   ?>
<div class="alert alert-danger">
    <strong>Oppps</strong>Your last name must be 5 more more characters long
  </div>
<?php
   }
   else
   {
    $info_submit_query = mysql_query("UPDATE user_details SET first_name='$firstname', last_name='$lastname', bio='$bio' WHERE username='$username'");
	 ?>
<div class="alert alert-danger">
    <strong>Oppps</strong>Your profile info has been updated!
  </div>
<?php
   }
  }
  else
  {
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

  if (isset($_FILES['profilepic'])) {
   if (((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif"))&&(@$_FILES["profilepic"]["size"] < 1048576)) 
  {
   $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
   $rand_dir_name = substr(str_shuffle($chars), 0, 15);
   mkdir("userdata/profile_pics/$rand_dir_name");

   if (file_exists("userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
   {
    echo @$_FILES["profilepic"]["name"]." Already exists";
   }
   else
   {
    move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/profile_pics/$rand_dir_name/".$_FILES["profilepic"]["name"]);
    $profile_pic_name = @$_FILES["profilepic"]["name"];
    $profile_pic_query = mysql_query("UPDATE user_details SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username='$username'");
    header("Location: account_settings.php");
    
   }
  }
  else
  {
   ?>
<div class="alert alert-danger">
    <strong>Oppps</strong>Invailid File! Your image must be no larger than 1MB and it must be either a .jpg, .jpeg, .png or .gif
  </div>
<?php
  }
  }


?>
<h2>Edit your Account Settings here!</h2>
<hr />
<p>UPLOAD YOUR PROFILE PHOTO:</p>
<form action="" method="POST" enctype="multipart/form-data">
<img src="<?php echo $profile_pic; ?>" width="70" />
<input type="file" name="profilepic" /><br />
<input type="submit" name="uploadpic" value="Upload Image">
</form>
<hr />

<form action="account_settings.php" method="POST">
<p><b><i>CHANGE PASSWORD</i></b></p>
Enter Old password: <input type ="password" name ="oldpassword" id="oldpassword" size="30"><br>
Enter New password: <input type ="password" name ="newpassword" id="newpassword" size="30"><br>
Confirm password: <input type ="password" name ="newpassword1" id="newpassword1" size="30"><br><br>
</form>
<hr/>

<form action="account_settings.php" method="post">
<p>UPDATE YOUR PROFILE INFO:</p> <br />
First Name: <input type="text" name="fname" id="fname" size="40" value="<?php echo $db_firstname; ?>"><br />
Last Name: <input type="text" name="lname" id="lname" size="40" value="<?php echo $db_last_name; ?>"><br />
Update Status: <textarea name="bio" id="bio" rows="7" cols="40"><?php echo $db_bio; ?></textarea>
<hr />
<input type="submit" name="updateinfo" id="updateinfo" value="Update Information">
</form>
<br><br>