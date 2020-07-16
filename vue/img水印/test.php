<?php
	require "image.class.php"
	$scr="001.jpg";
	$image=new Image();
	$image->thumb(300,150);
	$image->show();
?>