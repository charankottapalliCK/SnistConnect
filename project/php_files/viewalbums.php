<?php
include ("headerinc.php");
if (isset($_GET['u'])) {
	$username = mysql_real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
	$check = mysql_query("SELECT username, first_name FROM user_details WHERE username='$username' && removed='no'");
	if (mysql_num_rows($check)===1) {
	$get = mysql_fetch_assoc($check);
	$username = $get['username'];
	$firstname = $get['first_name'];
	}
	else
	{
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/project/index.php\">";
	exit();
	}
	}
}
?>
<h2><?php echo $username."'s"; ?> Albums:</h2><hr />
<table>
       <tr>
<?php
$get_albums = mysql_query("SELECT * FROM albums WHERE created_by='$username'");
$numrows = mysql_num_rows($get_albums);
while($row = mysql_fetch_assoc($get_albums)) {
  $id = $row['id'];
  $album_title = $row['album_title'];
  $album_description = $row['album_description'];
  $created_by = $row['created_by'];
  $date = $row['date_created'];
  $uid = $row['uid'];
  
  if (isset($_POST['remove_album_' . $uid . ''])) {
   $remove_album = mysql_query("UPDATE albums SET removed='yes' WHERE uid='$uid'");
   header("Location: $username");
  }

  echo "
  <td>
  <div class='albums'>
  <a href='view_photo/$uid'>
  <img src='#' height='200' width='140'><br><br>
  $album_title
  </a>
  <center>
  <form method='POST' action='$username'>
   <input type='submit' name='remove_album_$uid' value='Remove Album'>
  </form>
  </center>
  </div>
  </td>
  ";
}
?>
</tr>
</table>