<?php 
header("Content-Type:text/html;charset=utf-8");//设置当前页面的 编码问题
// if (isset($_POST['filename'])) {//判断客户端是否传入数据
	// $name = $_POST['filename'];//下载的文件名
	$name = 'bitworkshop_hr.doc';
	$filename ='../uploads/'.$name;//找到对应的文件
	$filename = iconv('utf-8', 'gb2312', $filename);//决绝中文编码问题 
	$fs = fopen($filename, 'r+');//文件流方式打开
	if (!file_exists($filename)) {
		 $data['code']=-1;
		 $data['message'] = "文件不存在";
		 echo json_encode($data);
		 exit();
 	}
 	$filesize = filesize($fs);//获取文件的大小
 	header("Content-type: application/octet-stream");
 	header("Accept-Ranges: bytes");
 	header("Accept-Length: ".$file_size);
 	header("Content-Disposition: attachment; filename=".$file_name);
 	$buffer = 1024;
 	while (!feof($fs)) {
 		$filsdata = fread($fs,$buffer);
 		echo $filedata;
 	}
 	fclose();
// }
 ?>