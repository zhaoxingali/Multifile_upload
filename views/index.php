<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../publics/index.css">
	<script src="../publics/index.js"></script>
	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   	<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
	<?php 
	require_once('../controls/showFiles.php'); 
	?>
	<div id="file">
		<form action="../controls/upload.php" method="POST" enctype="multipart/form-data">
			<label for="">选择文件
				<input type="file" name="upfile[]" multiple>
			</label>
			<button type="submit">上传</button>
		</form>
	</div>
	<div class="showFile" id="file">
		<ul class="list-group" id='showUl'>
			<h3>下载列表</h3>
			<?php
			if (@count($get_Filename)<=0) {
				echo "暂时没有资源可供下载";
			}else{
				foreach ($get_Filename as $key => $value) {
					echo "<li class='list-group-item'>".$value."</li>";
			 	} 
			}
			?>
		</ul>
	</div>
</body>
</html>