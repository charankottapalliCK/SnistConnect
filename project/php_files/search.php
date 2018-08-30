<?php
include("headerinc.php"); 
$search_name =@$_POST['q'];
$s_query = mysql_query("SELECT * FROM user_details WHERE username='$search_name'")or die(mysql_error());;
$get_result= mysql_fetch_assoc($s_query);
session_start();
$Username= $get_result['username'];

if($Username =="")
{
echo "Search not Found";
}
else{
header("Location:$Username");
}
?>