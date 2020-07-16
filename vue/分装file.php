<?php
	$fileInfo=$_FILE['myFile'];
	function uploadFile($fileInfo,$uploadPath='uploads',$allowExt=array('jpeg','jpg','gif','png'),$maxsize=2097152){
	if($fileInfo['error']>0){
		switch($fileInfo['error']){
			case 1:
				$mes='上传的文件超过了upload_max_filesize的值';
				break;
			case 2:
				 $mes='超过了表单MAX_FILE_SIZE限制的大小';
				 break;
			case 3:
				$mes='文件部分被上传';
				break;
			case 4:
				$mes='没有选择上传文件';
				break;
			case 6:
				$mes='没有找到临时目录';
				break;
			case 7:
			case 8:
					$mes='系统错误';
					break;	
		}
		exit($mes);
	}
	
	$ext=pathinfo($fileInfo['name'],PATHINOFO_EXTENSION);
//	$allowExt=array('jpeg','jpg','png','gif');
	if(!in_array($ext,$allowExt)){
		exit('非法字符类型');
	}
	
//	$maxsize=2097152; //2M;
	if($fileInfo['size']>$maxsize){
		exit('文件上传过大');
	}
	if(!is_uploaded_file($fileInfo['tmp_name'])){
		exit('文件不是通过post方式上传上来的');
	}
	
	if(!is_array($allowExt)){
		exit('系统错误');
	}
	
	if(!in_array($ext,$allowExt)){
		exit('非法文件类型');
	}
	
	if($flag){
		if(getimagesize($fileInfo['tmp_name'])){
			exit('不是真实图片类型');
		}
	}
//	$uploadPath='uploads';
	if(!file_exists($uploadPath)){
		mkdir($uploadPath,0777,true);
		chmod($uploadPath,0777);
	}
	$uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
	$destination=$uploadPath.'/'.$uniName;
	if(@move_uploaded_file($fileInfo['tmp_name'],$destination)){
		exit('文件移动失败');
	}
//	return array{
//		'newName'=>$destination,
//		'size'=>$fileInfo['size'],
//		'type'=>$fileInfo['type']
//	};
	return $destination;
//	echo '文件上传成功';
}
?>