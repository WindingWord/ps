<?php 
// 连接数据库 
//require_once 'connection.php';

$conn=@mysql_connect("localhost","root","root")  or die(mysql_error()); 
@mysql_select_db('cake',$conn) or die(mysql_error()); 
 
// 判断action, 判断图片的类型
$action = isset($_REQUEST['action'])? $_REQUEST['action'] : ''; 
 
// 上传图片 
if($action=='add'){
//	获取本地的图片并且编码,存到临时的文件,获取类型，jpg文件。binarydata，二进制数据，photo
//	提交的是图片的name
    $image = mysql_escape_string(file_get_contents($_FILES['photo']['tmp_name'])); 
    $type = $_FILES['photo']['type']; 
    $sqlstr = "insert into photo(type,binarydata) values('".$type."','".$image."')"; 
    @mysql_query($sqlstr) or die(mysql_error()); 
    header('location:img.php'); 
    exit(); 
// 显示图片
}else if($action=='show'){ 
    $id = isset($_GET['id'])? intval($_GET['id']) : 0; 
    $sqlstr = "select * from photo where id=$id"; 
    $query = mysql_query($sqlstr) or die(mysql_error());
    // 返回相关联的数组，输出请求头的数据
    $thread = mysql_fetch_assoc($query); 
    if($thread){ 
        header('content-type:'.$thread['type']); 
        echo $thread['binarydata']; 
        exit(); 
    } 
}else{ 
// 显示图片列表及上传表单 
?> 


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
 <head> 
  <meta http-equiv="content-type" content="text/html; charset=utf-8"> 
  <title> upload image to db demo </title> 
 </head> 
 
 <body> 
  <form name="form1" method="post" action="img.php"" enctype="multipart/form-data"> 
  <p>图片：<input type="file" name="photo"></p> 
  <p><input type="hidden" name="action" value="add"><input type="submit" name="b1" value="提交"></p> 
  </form> 
 
<?php 
    $sqlstr = "select * from photo order by id desc"; 
    $query = mysql_query($sqlstr) or die(mysql_error()); 
    $result = array(); 
    while($thread=mysql_fetch_assoc($query)){ 
        $result[] = $thread; 
    } 
    foreach($result as $val){ 
        echo '<p><img src="img.php?action=show&id='.$val['id'].'&t='.time().'" width="150"></p>'; 
    } 
?> 
</body> 
</html> 
<?php 
} 
?>
