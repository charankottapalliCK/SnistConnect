<html>
<head>
<meta charset="UTF-8">
<title>File Upload</title>
</head>
<body>
	<?php include("headerinc.php"); ?>
	<form action="upload.php" method="post" enctype="multipart/form-data" id="upload" class="upload">
	<fieldset>
<legend>Upload Files</legend>
<input type="file" id="file" name="file[]" required multiple>
<input type="submit" id="submit" name="submit" value="Upload">
	</fieldset>

	<div class="bar">
		<span class="bar-fill"><span class="bar-fill-text"></span></span>
	</div>
<div id="uploads" class="uploads">

<p> These files Did not upload</p>

</div>
<script src="upload.js"></script>
<script >
document.getElementById('submit').addEventListener('click', function(){
e.preventDefault();
	var f =document.getElementById('file'),
pd = document.getElementById(''),
pt = document.getElementById('pt');
app.uploader({
	files:f,
	progressBar: pb,
	progressText:pt,
	processor:'upload.php',

	finished:function(data){
		console.log(data);
	},
	error:function(){
		console.log('Not working');
	}
});
});
</script>
	</form>

</body>
</html>