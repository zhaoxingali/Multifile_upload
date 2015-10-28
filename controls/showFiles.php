<?php 
header("Content-Type:text/html;charset=utf-8");
$path = "../uploads";
$get_filename = getfilename($path);
for ($j=2; $j <count($get_filename) ; ++$j) { 
    $get_Filename[$j-2] = $get_filename[$j]; 
}
//提取文件夹下的文件名
function getfilename($dirpath){
    if (!$dirpath) {
        echo "文件目录不存在";
        $files='';
    }else{
    	$files = scandir($dirpath);
    }
    return $files;
}
 ?>