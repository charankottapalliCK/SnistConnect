<?php include("headerinc.php");
$getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10") or die(mysql_error());
while ($row = mysql_fetch_assoc($getposts)) {
						$id = $row['id'];
						$body = $row['body'];	
						$date_added = $row['date_added'];
						$added_by = $row['added_by'];
						$user_posted_to = $row['user_posted_to'];  }
echo "<h1><u>These people also posted the same posts</u></h1><br><hr/>";
$getposts = mysql_query("SELECT added_by ,body FROM posts WHERE body IN (SELECT body FROM posts WHERE user_posted_to='$username')") or die(mysql_error());
while ($row = mysql_fetch_assoc($getposts)) {
?><h1><b><?php echo $row['body'];?></b>&nbsp;posted by</h1>
<h1><i><?php echo $row['added_by'];	?></i></h1>
<?php
echo '<br>';


}


?> 
<style>
i{color:green;
font-size:20px;}
b{
font-size:20px;}
u{color:orange;
font-size:20px;}
</style>