<?php

//先判断cookie里是否有上次的登录信息

if(!empty($_COOKIE[‘lastVisit'])){

  echo “你上次登陆的时间是”.$_COOKIE[‘lastViat'];

//更新时间

setcookie(“lastVisit”,”data(Y-m-d H:i:s)”, time()+3600);

}else{

//说明用户是第一次登陆

echo”第一次登陆”;

//更新时间

setcookie(“lastViait”,”data(“Y-m-d H:i:s”)”, time()+3600);

}
?>

//获取用户是否选中了保存id

<!--if(!empty($_POST[‘cookie'])){

  setcookie(“id”,$id,time()-100);

}else{

  if(!empty($_COOKIE[‘id'])){

   setcookie(“id”,$id,time()-10);

}
}-->


