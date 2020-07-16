<?php
	$fileInfo=$_FILE['myFile'];
	$maxSize=2097152;
	$allowExt=array('jpeg','jpg','png','gif');
	if($fileInfo['error']==0){
		//判断上传文件的大小
		if($fileInfo['size']>$maxSize){
			exit('上传文件过大');
		}
//		$ext=strolower(end(explode('.',$fileInfo['name'])));
		$ext=pathinfo($fileInfo['name'],PATHINFO_EXTENSION);
		if(!in_array($ext,$allowExt)){
			exit('非法文件类型');
		}
		
		if(!is_uploaded_file($fileInfo['tmp_name'])){
			exit('文件不是通过HTTP POST方式上传来的');
		}
		
		if($flag){
			if(!getimagesize($fileInfo['tmp_name'])){
				exit('不是真正的图片类型');
			}
		}
		
		$path='uploads';
		if(!file_exists($path)){
			mkdir($path,0777,true);
			chomd($path,0777);
		}
		$nuiName=md5(uniqid(microtime(true),true)).'.'.$ext;
		
		$destination=$path.'/'.$fileInfo['name'];
		if(move_uploaded_file($fileInfo['tmp_name'],$destination)){
			echo "文件上传成功";
		}else{
			echo "文件上传失败";
		}
	}else{
		
	}
?>