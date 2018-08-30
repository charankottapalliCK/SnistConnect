<?php
include("headerinc.php");
if (isset($_GET['u'])) {
	$username = mysql_real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
	$check = mysql_query("SELECT username FROM user_details WHERE username='$username'");
	if (mysql_num_rows($check)===1) {
	$get = mysql_fetch_assoc($check);
	$username = $get['username'];
	$user=$_SESSION["user_login"];
	if ($username != $user) {
          if (isset($_POST['submit'])) {
            $msg_title = strip_tags(@$_POST['msg_title']);
            $msg_body = strip_tags(@$_POST['msg_body']);
            $date = date("Y-m-d");
            $opened = "no";
            $deleted = "no";
            
            if ($msg_title == "Title") {
			?>
			 <div class="alert alert-warning">
    <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
  </div>
  <?php
            }
            else
            if (strlen($msg_title) < 3) {
			?>
			<div class="alert alert-warning">
    <strong>yeh dude!</strong>Your message title cannot be less than 3 characters!..
  </div>
  <?php
            }
            else
            if ($msg_body == "Enter the message you wish to send ...") {
            ?>
			<div class="alert alert-warning">
    <strong>yeh dude!</strong> Please write a message!..
  </div>
  <?php
            }
            else
            if (strlen($msg_body) < 3) {
             ?>
			<div class="alert alert-warning">
    <strong>yeh dude!</strong>Your message cannot be less than 3 characters in length!..
  </div>
  <?php
            }
            else
            {

            $send_msg = mysql_query("INSERT INTO messages VALUES ('','$user','$username','$msg_title','$msg_body','$date','$opened','$deleted')");
          ?>
			<div class="alert alert-success">
    <strong>cool buddy!</strong> Your message has been sent!
  </div>
    <?php
            }
          }
        echo "
        
        <form action='send_msg.php?u=$username' method='POST'>
        <h2>Compose Message to $username</h2>
        <input type='text' name='msg_title' size='30' onClick=\"value=''\" placeholder='Enter the message title here ...'><p />
        <textarea cols='50' rows='12' name='msg_body' placeholder='Enter the message you wish to send ...'></textarea><p />
        <input type='submit' name='submit' value='Send Message'>
        </form>

        ";
        }
        else
        {
         header("Location: $username");
        }
	}
	}
}
?>