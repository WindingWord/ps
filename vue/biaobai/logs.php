<?php 
    $postdata = $_POST;
    $fp = fopen('./log.txt','a+');   
    fwrite($fp,var_export($postdata,true));   
    fclose($fp); 
 
    if($postdata['nickname']){
	$arr['state'] = 1;
	$arr['info'] = '提交成功';
    }else{
	$arr['state'] = 0;
	$arr['info'] = '名字为空';
    }
    echo json_encode($arr);die;