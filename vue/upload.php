<?php
//$path=$_SERVER['DOCUMENT_ROOT'].'test2/';
//if(!empty($_FILES)){
//echo "aaaa";
//if(is_uploaded_file($_FILES['images']['tmp_name'][0])){
//echo "1111";
//exit;
//}
//foreach($_FILES['images']['tmp_name'] as $k=>$v){
//if(is_uploaded_file($_FILES['images']['tmp_name'][$k])){
//$save=$path.$_FILES['images']['name'][$k];
//echo $save."<br>";
//if(move_uploaded_file($_FILES['images']['tmp_name'][$k],$save)){
//echo "上传成功！";
//}
//}
//}
//echo "<pre>";
//print_r($_FILES);
//echo "</pre>";
//}

$filename=$_GET['filename'];
header('content-disposition:attachment;filename='.basename($filename));
header('content-length:'.filesize($filename));
readfile($filename);
?>

<?php
	print_r($_FILES);
	$filename=$_FILES['myFile']['name'];
	$type=$_FILES['myFile']['type'];
	$tmp_name=$_FILES['myFile']['tmp_name'];
	$size=$_FILES['myFile']['size'];
	$error=$_FILES['myFile']['error'];
	if($error==UPLOAD_ERR_OK){
		if(move_uploaded_file($tmp_name,"uploads/".$filename)){
			echo '文件'.$filename.'上传成功';
		}else{
			echo '文件'.$filename.'上传失败';
		}
	}else{
		switch($error){
			case 1:
				echo '上传的文件超过了upload_max_filesize的值';
				break;
			case 2:
				echo '超过了表单MAX_FILE_SIZE限制的大小';
			case 3:
				echo '文件部分被上传';
				break;
			case 4:
				echo '没有选择上传文件';
				break;
			case 6:
				echo '没有找到临时目录';
				break;
			case 7:
			case 8:
					echo '系统错误';
					break;
				
		}
	}
	
