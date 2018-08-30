<?php include("headerinc.php");?>
<?php
$reg = @$_POST['reg'];
$fn = "";
$ln = "";
$un = "";
$em = "";
$em2 = "";
$pass = "";
$cpass = "";
$d = "";

$u_check = "";

$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$em = strip_tags(@$_POST['email']);
$em2 = strip_tags(@$_POST['email2']);
$pass = strip_tags(@$_POST['password']);
$cpass = strip_tags(@$_POST['conpassword']);
$d = date("Y-m-d");

if($reg){
if($em==$em2){
$u_check = mysql_query("SELECT username FROM user_details WHERE username='$un'");
$check = mysql_num_rows($u_check);
$e_check = mysql_query("SELECT email from user_details WHERE email='$em'");
$email_check = mysql_num_rows($e_check); 
if($check == 0){
if($email_check == 0){
if($fn&&$ln&&$un&&$em&&$em2&&$pass&&$cpass){
if($pass==$cpass){
if(strlen($un)>25||strlen($fn)>25||strlen($ln)>25){ ?>
<div class="alert alert-danger">
    <strong>Oppps</strong> maximum charectors allowed is 25!!.
  </div>
<?php
}
else
{
if(strlen($pass)>30||strlen($pass)<5){  ?>
<div class="alert alert-danger">
    <strong>Oppps</strong> Your password must be between 5 to 30 charectors
  </div>
<?php
}
else{
$pass = md5($pass);
$cpass = md5($cpass);
$query = mysql_query("INSERT INTO user_details VALUES('','$un','$fn','$ln','$em','$pass','$d','0','Write something about yourself.','','')");
echo '<div class="alert alert-success">
    <strong>Success!</strong> Your account is Succesfully created log in to get started..
  </div>';
}
}
}
else{ ?>
<div class="alert alert-danger">
    <strong>Oppps</strong> your passwords do not match!
  </div>
<?php
}
}
else{ ?>
<div class="alert alert-danger">
    <strong>Oppps</strong> please fill in all details
  </div>
<?php
}
}
else
{ ?>
<div class="alert alert-danger">
    <strong>Oppps</strong> Sorry someone has already taken that email
  </div>
<?php
}
}
else
{
 ?>
<div class="alert alert-danger">
    <strong>Oppps</strong>Seems has already taken your Username...
  </div>
<?php
}
}
else
{
?>
<div class="alert alert-danger">
    <strong>Oppps</strong>your emails dont match!..
  </div>
<?php
}
}
if(isset($_POST["user_login"]) && isset($_POST["password_login"])){
$user_login = preg_replace('#[^A-Za-z0-9]#i','',$_POST["user_login"]);
$password_login = preg_replace('#[^A-Za-z0-9]#i','',$_POST["password_login"]);
$password_login_md5 = md5($password_login);
$sql = mysql_query("SELECT id FROM user_details WHERE username='$user_login' AND password='$password_login_md5' LIMIT 1");
$usercount = mysql_num_rows($sql);
if($usercount == 1){
while($row = mysql_fetch_array($sql)){
$id = $row["id"];
}
$_SESSION["user_login"] = $user_login;
header("location:profile.php");
exit();
}
else{
?>
 <div class="alert alert-danger">
    <strong>Invalid password!</strong> Please check your username and password
  </div>
<?php
}
}
?>
<div style="width:800px;margin:0px auto 0px auto;">
<table>
<tr>
<td width="60%" valign="top">
<h2>Already a member? Sign in now!</h2>

<form action="index.php" method="POST">
<input type="text" name="user_login" size="25" placeholder="Username"/><br/><br/>
<input type="password" name="password_login" size="25" placeholder="Password"/><br/><br/>
<input type="submit" name="login" value="Login">
</form>

</td>
<td width="40%" valign="top">
<h2>Sign Up Below!</h2>
<form action="#" method="POST">
<input type="text" name="fname" size="25" placeholder="First Name"/><br/><br/>
<input type="text" name="lname" size="25" placeholder="Last Name"/><br/><br/>
<input type="text" name="username" size="25" placeholder="UserName"/><br/><br/>
<input type="text" name="email" size="25" placeholder="Email Address"/><br/><br/>
<input type="text" name="email2" size="25" placeholder="Email Address(confirm)"/><br/><br/>
<input type="password" name="password" size="25" placeholder="Password"/><br/><br/>
<input type="password" name="conpassword" size="25" placeholder="Confirm Password"/><br/><br/>
<INPUT TYPE="Radio" Name="Gender" Value="Male">Male
<INPUT TYPE="Radio" Name="Gender" Value="Female">Female<br/><br/>
<input type="submit" name="reg" value="Sign Up!">
</form>
</td>
</tr>
</table>
</div>
<?php include("footerinc.php");?>
