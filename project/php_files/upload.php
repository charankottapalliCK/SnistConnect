<?php
header('Content-Type: application/json');
$uploaded=[];
$allowed=['mp4','png','jpg','jpeg','pdf'];
$succeded=[];
$failed=[];
if(!empty($_FILES['file'])){
	foreach ($_FILES['file']['name'] as $key => $name) {
		if($_FILES['file']['error'][$key]===0){
			$temp = $_FILES['file']['tmp_name'][$key];
			$ext=explode('.',$name);
			$ext=strtolower(end($ext));
			$file = md5_file($temp).time().'.'.$ext;
				if(in_array($ext, $allowed)===true && move_uploaded_file($temp, "uploads/{$file}")===true){
					$succeded[]=array('name'=>$name,'file'=>$file);
					header("Location:myupload.php");
				}else{
					$failed[]=array('name' => $name);
				}
			}
		}
		if(!empty($POST['ajax'])){
			echo json_encode(array('succeded' => $succeded , 'failed' => $failed));
		}
		
	}
?>