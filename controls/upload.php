<?php
header("Content-Type:text/html;charset=utf-8");
if (isset($_FILES['upfile'])) {
 	$path = "../uploads";//根目录
 	$filesArray = $_FILES['upfile'];

 	$message = upload_mutiple_file($path,$filesArray);
 	if ($message!=="success") {
        $getdata['getCode'] ='0'; 
        $getdata['Message'] = $message;
    }else{
        $getdata['getCode'] = '1';
        $getdata['Message'] = 'success';
    }
    echo json_encode($getdata);
    // echo "<script>window.location.href='../views/index.php';</script>";

 } 
 function upload_mutiple_file($dir,$files){
 	$overwrite=0;  
    $allowed_file_type= array("txt","pdf","ppt","pptx","xls","xlxs","doc","psd","cmd","docx","jpg", "jpeg", "png", "gif","zip","rar");  
    $max_file_size = 2097152;
    //判断文件是否能够上传
    foreach($files['name'] as $fkey=> $fname){  
        $ext = pathinfo($fname, PATHINFO_EXTENSION); //返回文件扩展名 
        if (!in_array($ext, $allowed_file_type)) {  
            return "unsupported file format";  
            break;  
        }  
    }  
    //判断文件名是否冲突
   	foreach($files['name'] as $fkey=> $fname){  
        $ext = pathinfo($fname, PATHINFO_BASENAME); //返回文件名 
        if (get_file($dir,$ext)==1) {
        	return $ext."文件与服务器中的文件名冲突";
        	break;
        }

    }  
    foreach($files['tmp_name'] as $key => $tmp_name ){  
        $file_name = $files['name'][$key];  
        $file_size =$files['size'][$key];  
        $file_tmp_name =$files['tmp_name'][$key];  
        $file_type=$files['type'][$key];  
        if($file_size >0) {  
            if($file_size > $max_file_size){  
                $fsize=$max_file_size/1048576;  
                return  'File size must be less than '.$fsize.' MB';  
                break;  
            }  
        }  
        if(is_dir($dir)==false){  
            $status =  mkdir("$dir");    
            if($status < 1){  
                return "unable to create  diractory $dir ";  
            }                
        }  
        if(is_dir($dir)){  
            if($overwrite < 1){  
                move_uploaded_file($file_tmp_name,"$dir/".$file_name);  
            }  
               
        }  
    }
    return "success";
 }
 //判断是不是同名
 function get_file($dir,$orderfile){
	if (!$dir) {
		echo "文件目录不存在";
		return -1;
	}
	$files = scandir($dir);
	for ($i=0; $i <count($files); $i++) { 
		if ($files[$i]==$orderfile) {
			return 1;
			break;
		}
	}
}
 ?>
