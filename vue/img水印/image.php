<?php
	$src="im.jpg";
	$info=getimagesize($src);
	$type=image_type_to_extension($info[2],false);
	$fun="imagecreatefrom{$type}";
	$image=$fun($src);
	
	$image_Mark="imooc.png";
	$info2=getimagesize($image_Mark);
	$type=image_type_to_extension($info2[2],false);
	$fun2='imagecreatefrom{$type}';
	$water=$fun2($image_Mark);
	imagecopymerge($image,$water,20,30,0,0,$info[0],$info2[1],30);
	
	
	header("Content-type:".$info['mime']);
	$funs="image{$type}";
	$funs($image);
	$fun($image,'imageMark.'.$type);
	imagedestroy($water);
?>