<?php
	$src="im.jpg";
	$info=getimagesize($src);
	$type=image_type_to_extension($info[2],false);
	$fun="imagecreatefrom{$type}";
	$iamge=$fun($src);
	
	$image_thumb=imagecreatetruecolor(300,200);
	imagecopyresampled($image_thumb,$iamge,0,0,0,0,300,200,$info[0],$info[1]);
	imagedestroy($image);
	header("Content-type:".$info['mime']);
	$funs="image($type)";
	$funs($image_thumb);
	$funs($image_thumb,"thumb_image.".$type);
	imagedestroy($image_thumb);
?>