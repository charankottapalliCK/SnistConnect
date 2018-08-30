<?php
if (!isset($_SESSION["user_login"])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/project/index.php\">";
}
else
{
?>
<div class="newsFeed">


</div>
<?php

$getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id ASC LIMIT 10") or die(mysql_error());
while ($row = mysql_fetch_assoc($getposts)) {
						$id = $row['id'];
						$body = $row['body'];	
						$date_added = $row['date_added'];
						$added_by = $row['added_by'];
						$user_posted_to = $row['user_posted_to'];  

						$get_user_info = mysql_query("SELECT * FROM user_details WHERE username='$added_by'");
						$get_info = mysql_fetch_assoc($get_user_info);
						$profilepic_info = $get_info['profile_pic'];
						if ($profilepic_info == "") {
						 $profilepic_info = "pr.jpg";
						}
						else
						{
						 $profilepic_info = "./userdata/profile_pics/".$profilepic_info;
						}
						$get_comments =mysql_query("SELECT * FROM post_comments WHERE post_id='$id' ORDER BY id DESC");
						while($comment =mysql_fetch_assoc($get_comments)){
						$comment_body =$comment['post_body'];	
						$posted_to = $comment['posted_to'];
						$posted_by = $comment['posted_by'];
						$removed = $comment['post_removed']; 
						
						}
						?>

<script language="javascript">
         function toggle<?php echo $id; ?>() {
           var ele = document.getElementById("toggleComment<?php echo $id; ?>");
           var text = document.getElementById("displayComment<?php echo $id; ?>");
           if (ele.style.display == "block") {
              ele.style.display = "none";
           }
           else
           {
             ele.style.display = "block";
           }
         }
</script>

              <?php
						echo  "

						<p />
						<div class='newsFeedPost'>
						<div class='newsFeedPostOptions'>
                                               
						</div>
                                                <div style='float: left;'>
                                                <img src='$profilepic_info' height='30'>
                                                </div>
						<div class='posted_by'>$added_by on $date_added:</div>
                                                <br /><br />
                                                <div  style='max-width: 600px;'>
                                                <h4>$body</h4><br /><p /><p />
                                                </div>
                                                <div id='toggleComment$id' style='display: none; padding-left:30px;'>
                                                <br />
                                                <iframe src='comment_frame.php?id=$id' frameborder='0' style='max-height: 150px; width: 100%; min-height: 10px;border: 4px solid rgba(0,0,0,0.1);padding: 8px 10px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;outline: 0;'></iframe>
                                                </div>
												<a href='javascript:void(0)' onClick='javascript:toggle$id()'>Show Comments</a>
                                                <p />
                                                </div>
						";
}
}
?> 