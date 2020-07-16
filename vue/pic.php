<?php
require_once 'conn.php';
$file = $_FILES['myfile'];  //得到传输的数据,以数组的形式
$name = $file['name'];      //得到文件名称，以数组的形式
$upload_path = "D:\phpStudy\PHPTutorial\WWW\vue\Picture\"; 

foreach ($name as $k=>$names){
    $type = strtolower(substr($names,strrpos($names,'.')+1));//得到文件类型，并且都转化成小写
    $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
    //把非法格式的图片去除
    if (!in_array($type,$allow_type)){
        unset($name[$k]);
    }
}
