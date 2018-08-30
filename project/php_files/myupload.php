<?php
	include("headerinc.php");
	?>
	<h1><?php echo $username ?>'s Albums</h1>
	<h1><a href ="myload.php">Click here Upload your files</h1>
	<?php
    $dir ='uploads/';
    $file_display = array('jpg', 'jpeg', 'png', 'gif','mp4','pdf','mov');

    if (file_exists($dir) == false) {
    echo 'Directory \'', $dir, '\' not found!';
    } else {
    $dir_contents = scandir($dir);

    foreach ($dir_contents as $file) {
      $file_type = strtolower(end(explode('.', $file)));

     if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true)     
	{ 
	echo '<img  style=" border:1px solid #ccc; padding:2px; background:#eee; overflow:hidden;border:solid 1px #c7c7c7;
-webkit-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.30);
-moz-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.30);
box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.30);"  src="', $dir, '/', $file, '" alt="', $file, 'Unable to load" height="200px" width="200px">';
     }
    }
    }
?>