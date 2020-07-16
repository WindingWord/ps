<?php
header("Content-Type:text/plain;charset=utf-8");
header("Content-Type:text/json;charset=utf-8");
$staff=array(
	array("name"=>"de","number"==>"101","sex"==>"男","job"=>"总经理"),
	array("name"=>"味儿","number"==>"102","sex"==>"男","job"=>"开发工程师"),
	array("name"=>"明白","number"==>"103","sex"==>"男","job"=>"产品经理")
);
if($_SERVER["REQUEST_MOTHOD"]=="GET"){
	search();
}else if($_SERVER["REQUEST_MOTHOD"]=="POST"){
	create();
}
function search(){
	if(!isset($_GET["number"])||empty($_GET["number"])){
		echo '{"success":false:"msg":"参数错误"}';
		return;
	}
	global $staff;
	$number=$_GET["number"];
	$result='{"success":false,"msg":"没有找到员工"}';
	foreach($staff as $value){
		if($value["number"]==$number){
			$result='{"success":true,"msg":"找到员工:员工编号:".$value["number"].",员工姓名:".$value["name"].",员工性别".$value["sex"].".员工职位".$value["job"]}';
			break;
		}
	}
	echo $result;
}

function create(){
	if(!isset($_POST["name"])||empty($_POST["name"])
	||!isset($_POST["number"])||empty($_POST["number"])
	||!isset($_POST["sex"])||empty($_POST["sex"])
	||!isset($_POST["job"])||empty($_POST["job"])){
		return;
	}
	echo '{"success:true,"msg":"员工:'.$_POST["name"].'"信息保存成功"}';
	
}
?>